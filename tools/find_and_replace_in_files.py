#!/usr/bin/env python3
import os
import argparse
import re

def is_binary_file(filepath):
    """
    Checks if a file is likely binary by looking for null bytes in the first 1KB.
    """
    try:
        with open(filepath, 'rb') as f:
            chunk = f.read(1024)
            return b'\0' in chunk
    except IOError:
        return True # If we can't read it, treat as binary or problematic

def find_replace_in_file(filepath, find_str, replace_str, is_regex=False, ignore_case=False, dry_run=False, verbose=False):
    """
    Replaces occurrences of find_str with replace_str in a single file.
    Returns True if a change was made (or would be made in dry_run), False otherwise.
    """
    if is_binary_file(filepath):
        if verbose:
            print(f"Skipping binary file: {filepath}")
        return False

    try:
        with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
            original_content = f.read()
    except Exception as e:
        if verbose:
            print(f"Error reading file {filepath}: {e}")
        return False

    new_content = original_content
    num_replacements = 0

    if is_regex:
        try:
            regex_flags = re.IGNORECASE if ignore_case else 0
            compiled_regex = re.compile(find_str, flags=regex_flags)
            new_content, num_replacements = compiled_regex.subn(replace_str, original_content)
        except re.error as e:
            print(f"Error: Invalid regex '{find_str}': {e}")
            return False
    else:
        # Literal string replacement
        num_replacements = original_content.count(find_str)
        if num_replacements > 0:
            new_content = original_content.replace(find_str, replace_str)

    made_change_to_content = (new_content != original_content)

    if made_change_to_content:
        if dry_run:
            print(f"DRY RUN: Would replace {num_replacements} occurrence(s) in {filepath}")
        else:
            try:
                with open(filepath, 'w', encoding='utf-8', errors='ignore') as f:
                    f.write(new_content)
                if verbose:
                    print(f"Replaced {num_replacements} occurrence(s) in {filepath}")
            except Exception as e:
                print(f"Error writing to file {filepath}: {e}")
                return False # Failed to write
        return True # Indicates a change was made or would be made
    else: # No change to content
        if verbose:
            if num_replacements > 0:
                # This means find_str was present, but replacing it resulted in the same content
                print(f"Pattern '{find_str}' matched {num_replacements} time(s) but resulted in no change to content in {filepath}")
            else:
                print(f"No occurrences of '{find_str}' found in {filepath}")
        return False

def main():
    parser = argparse.ArgumentParser(
        description="Find and replace text in files recursively.",
        formatter_class=argparse.RawTextHelpFormatter
    )
    parser.add_argument("find_text", help="Text or regex pattern to find.")
    parser.add_argument("replace_text", help="Text to replace with.")
    parser.add_argument("directory", nargs='?', default=".",
                        help="Directory to search in (default: current directory).")
    parser.add_argument("--regex", "-r", action="store_true",
                        help="Treat find_text as a regular expression.")
    parser.add_argument("--ext", dest="extensions",
                        help="Comma-separated list of file extensions to process (e.g., .txt,.py).\nProcesses all files if not specified.")
    parser.add_argument("--ignore-case", "-i", action="store_true",
                        help="Perform case-insensitive search (only effective with --regex).")
    parser.add_argument("--dry-run", "-n", action="store_true",
                        help="Show what would be changed without modifying files.")
    parser.add_argument("--verbose", "-v", action="store_true",
                        help="Enable verbose output.")
    parser.add_argument("--cleanup-target-dirs", action="store_true",
                        help="After processing, delete 'node_modules', 'vendor'/'vendors', and '.moon/cache' directories found within the target directory.")
    args = parser.parse_args()

    if not os.path.isdir(args.directory):
        print(f"Error: Directory '{args.directory}' not found.")
        return

    if not args.find_text and not args.regex:
        print("Error: Find text cannot be empty for literal replacement.")
        return
    if not args.find_text and args.regex:
         print("Warning: Using an empty string as a regex pattern can have surprising results.")


    if args.ignore_case and not args.regex:
        print("Warning: --ignore-case is only effective with --regex. Ignoring --ignore-case flag.")

    allowed_extensions = None
    if args.extensions:
        allowed_extensions = [ext.strip() if ext.startswith('.') else '.' + ext.strip()
                              for ext in args.extensions.split(',')]
        if args.verbose:
            print(f"Processing files with extensions: {', '.join(allowed_extensions)}")

    files_considered_for_processing = 0
    files_changed = 0
    total_files_scanned = 0

    for root, _, files in os.walk(args.directory):
        for filename in files:
            total_files_scanned += 1
            filepath = os.path.join(root, filename)

            # Skip .lock files explicitly
            if filename.endswith(".lock"):
                if args.verbose:
                    # No need for DRY RUN prefix here as it's a hard skip
                    print(f"Skipping lock file: {filepath}")
                continue
                
            if allowed_extensions:
                if not any(filename.endswith(ext) for ext in allowed_extensions):
                    if args.verbose and args.dry_run: # Only print skip message if relevant
                         print(f"DRY RUN: Skipping {filepath} due to extension filter.")
                    elif args.verbose and not args.dry_run:
                         print(f"Skipping {filepath} due to extension filter.")
                    continue
            
            files_considered_for_processing += 1
            if find_replace_in_file(filepath, args.find_text, args.replace_text,
                                    is_regex=args.regex, ignore_case=args.ignore_case,
                                    dry_run=args.dry_run, verbose=args.verbose):
                files_changed += 1

    print(f"\nScanned {total_files_scanned} total files.")
    print(f"Considered {files_considered_for_processing} files for processing (after extension filtering).")
    if args.dry_run:
        print(f"DRY RUN: Would have modified {files_changed} files.")
    else:
        print(f"Modified {files_changed} files.")
    
    if args.cleanup_target_dirs:
        print("\n--- Starting cleanup of target directories ---")
        TARGET_DIR_NAMES = ["node_modules", "vendor", ".moon/cache"]
        if args.verbose:
            print(f"Looking for directories to delete: {', '.join(TARGET_DIR_NAMES)}")

        deleted_dir_count = 0
        # We need to walk again to find directories at various depths
        # topdown=True allows us to modify `dirs` to prevent descending into deleted directories
        for root, dirs, _ in os.walk(args.directory, topdown=True):
            # Iterate over a copy of dirs because we might modify it
            for dir_name in list(dirs):
                if dir_name in TARGET_DIR_NAMES:
                    dir_to_delete_path = os.path.join(root, dir_name)
                    if args.dry_run:
                        print(f"DRY RUN: Would delete directory: {dir_to_delete_path}")
                        deleted_dir_count += 1
                        # In a real scenario, we'd remove it from `dirs` here too
                        # to prevent os.walk from trying to descend into it.
                        # For dry run, it's okay, but good to be aware.
                    else:
                        if args.verbose:
                            print(f"Attempting to delete directory: {dir_to_delete_path}")
                        try:
                            shutil.rmtree(dir_to_delete_path)
                            print(f"Successfully deleted directory: {dir_to_delete_path}")
                            deleted_dir_count += 1
                            dirs.remove(dir_name) # Prevent os.walk from trying to descend into it
                        except Exception as e:
                            print(f"Error deleting directory {dir_to_delete_path}: {e}")
        
        if args.dry_run:
            print(f"\nDRY RUN: Would have deleted {deleted_dir_count} target director(ies).")
        else:
            print(f"\nDeleted {deleted_dir_count} target director(ies).")
        print("--- Directory cleanup finished ---")

if __name__ == "__main__":
    main()
