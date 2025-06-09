#!/bin/bash

# Script to remove 'ui-' prefix from folder names and occurrences in file contents
# within a monorepo structure.

# Exit immediately if a command exits with a non-zero status.
set -e
# Optional: Treat unset variables as an error.
# set -u
# Optional: Causes a pipeline to return the exit status of the last command in the pipe
# that returned a non-zero return value.
# set -o pipefail

DRY_RUN=true
FORCE_EXECUTION=false

# --- Script Usage ---
usage() {
  echo "Usage: $0 [--force]"
  echo "  --force: Apply changes. Without this flag, the script runs in dry-run mode."
  echo ""
  echo "This script will:"
  echo "1. Find folders starting with 'ui-' under 'libs' and 'projects' (excluding 'vendors', 'vendor', 'node_modules', 'var', 'public', 'dist')."
  echo "2. Rename them by removing the 'ui-' prefix (deleting existing target folder if it exists when --force is used)."
  echo "3. Find and remove all occurrences of 'ui-' in files under 'libs', 'projects', and in './tsconfig.json'."
  echo "   (excluding files in 'vendors', 'vendor', 'node_modules', 'var', 'public', 'dist')."
  echo ""
  echo "WARNING: The --force option is potentially destructive. Backup your work before using it."
  exit 1
}

# --- Parse command-line arguments ---
if [ "$#" -gt 1 ]; then
  echo "Error: Too many arguments."
  usage
fi

if [ "$1" = "--force" ]; then
  FORCE_EXECUTION=true
  DRY_RUN=false
elif [ -n "$1" ]; then # Check if any argument is provided and it's not --force
  echo "Error: Unknown argument '$1'."
  usage
fi


if [ "$FORCE_EXECUTION" = true ]; then
  echo "--------------------------------------------------------------------"
  echo "                        !!! WARNING !!!                             "
  echo "--------------------------------------------------------------------"
  echo "Running in FORCE mode. Changes WILL be applied."
  echo "This includes:"
  echo "  - Potentially DELETING existing folders if they match new names."
  echo "  - Modifying files IN-PLACE."
  echo "--------------------------------------------------------------------"
  read -p "Are you absolutely sure you want to continue? (yes/no): " confirmation
  if [[ "$confirmation" != "yes" ]]; then
    echo "Operation cancelled by user."
    exit 0
  fi
else
  echo "Running in DRY-RUN mode. No changes will be applied."
  echo "Review the output below to see what would happen."
  echo "Use --force to apply changes."
fi
echo

# --- Helper for logging ---
log_action() {
    if [ "$DRY_RUN" = true ]; then
        echo "[DRY-RUN] Would $1"
    else
        echo "[ACTION] $1"
    fi
}

# --- 1. Find and rename folders ---
rename_folders() {
  echo "--- Step 1: Processing folders to remove 'ui-' prefix ---"
  local old_dir_path
  local parent_dir
  local dir_name
  local new_dir_name
  local new_dir_path
  local -a folders_to_rename_details # Array to store details for dry-run summary

  local -i count_folders_to_rename=0
  # Use process substitution and a while loop to read null-delimited paths
  while IFS= read -r -d $'\0' old_dir_path_loop; do
    parent_dir=$(dirname "$old_dir_path_loop")
    dir_name=$(basename "$old_dir_path_loop") # e.g. ui-components
    
    # Ensure dir_name actually starts with ui- before stripping
    if [[ "$dir_name" != ui-* ]]; then
        continue # Should not happen due to -name "ui-*" in find, but as a safeguard
    fi
    new_dir_name="${dir_name#ui-}"

    if [ -z "$new_dir_name" ]; then
      echo "Warning: Renaming '$old_dir_path_loop' would result in an empty name (original: '$dir_name'). Skipping this folder."
      folders_to_rename_details+=("  - $old_dir_path_loop -> SKIPPED (empty new name)")
      continue
    fi
    
    new_dir_path="$parent_dir/$new_dir_name"
    folders_to_rename_details+=("  - $old_dir_path_loop -> $new_dir_path")
    count_folders_to_rename=$((count_folders_to_rename + 1))
  done < <(find libs projects \( -name "vendors" -o -name "node_modules" -o -name "vendor" -o -name "var" -o -name "public" -o -name "dist" \) -prune -o -type d -name "ui-*" -print0 2>/dev/null || true)
  # Added 2>/dev/null to suppress find errors if libs/projects don't exist (handled later)
  # `|| true` ensures the script doesn't exit if find returns non-zero (e.g. no paths found)

  if [ "$count_folders_to_rename" -eq 0 ] && [ ${#folders_to_rename_details[@]} -eq 0 ]; then
    echo "No folders starting with 'ui-' found to rename (or only skipped ones)."
  else
    echo "Folders to be renamed/skipped ($count_folders_to_rename actual renames proposed):"
    for detail in "${folders_to_rename_details[@]}"; do
      echo "$detail"
    done

    if [ "$DRY_RUN" = false ]; then
      echo "Applying folder renames (deepest first to handle nested cases)..."
      # Re-fetch with -depth for the actual renaming loop to ensure children are renamed before parents
      while IFS= read -r -d $'\0' old_dir_path; do
        parent_dir=$(dirname "$old_dir_path")
        dir_name=$(basename "$old_dir_path")

        if [[ "$dir_name" != ui-* ]]; then
            continue 
        fi
        new_dir_name="${dir_name#ui-}"
        
        if [ -z "$new_dir_name" ]; then
          # This case was already logged during the collection phase
          continue
        fi
        new_dir_path="$parent_dir/$new_dir_name"

        # Safety check: do not proceed if old and new paths are identical
        if [ "$old_dir_path" = "$new_dir_path" ]; then
            echo "Warning: Old and new path are identical for '$old_dir_path'. Skipping rename."
            continue
        fi

        log_action "rename folder: $old_dir_path -> $new_dir_path"
        
        if [ -d "$new_dir_path" ]; then
          log_action "target folder '$new_dir_path' already exists. Deleting it."
          rm -rf "$new_dir_path"
        fi
        
        # Ensure parent of new_dir_path exists (it's parent_dir, which must exist if old_dir_path was found)
        # mkdir -p "$(dirname "$new_dir_path")" # Generally not needed as parent_dir exists
        mv "$old_dir_path" "$new_dir_path"
      done < <(find libs projects \( -name "vendors" -o -name "node_modules" -o -name "vendor" -o -name "var" -o -name "public" -o -name "dist" \) -prune -o -type d -name "ui-*" -depth -print0 2>/dev/null || true)
    fi
  fi
  echo
}

# --- 2. Search and replace 'ui-' in files ---
replace_in_files() {
  echo "--- Step 2: Processing file contents to remove 'ui-' ---"
  local file_path_loop
  local -a files_to_modify_list # Array to store files for dry-run summary
  local -i count_files_to_modify=0

  # Find files under libs and projects, excluding vendors/node_modules
  # Note: This find operation runs *after* folders have been renamed (if not in dry-run).
  while IFS= read -r -d $'\0' file_path_loop; do
    if LC_ALL=C grep -q 'ui-' "$file_path_loop"; then
        files_to_modify_list+=("$file_path_loop")
        count_files_to_modify=$((count_files_to_modify + 1))
    fi
  done < <(find libs projects \( -name "vendors" -o -name "node_modules" -o -name "vendor" -o -name "var" -o -name "public" -o -name "dist" \) -prune -o -type f -print0 2>/dev/null || true)

  # Add tsconfig.json at the root
  if [ -f "tsconfig.json" ]; then
    if LC_ALL=C grep -q 'ui-' "tsconfig.json"; then
      local found_tsconfig_in_list=false
      for f_in_list in "${files_to_modify_list[@]}"; do
        # Resolve to absolute paths for comparison to avoid issues with ./tsconfig.json vs tsconfig.json
        if [ "$(realpath "$f_in_list")" = "$(realpath "tsconfig.json")" ]; then
          found_tsconfig_in_list=true
          break
        fi
      done
      if [ "$found_tsconfig_in_list" = false ]; then
        files_to_modify_list+=("tsconfig.json")
        count_files_to_modify=$((count_files_to_modify + 1))
      fi
    fi
  fi

  if [ "$count_files_to_modify" -eq 0 ]; then
    echo "No files found containing 'ui-' to modify."
  else
    echo "Files that would be modified to remove 'ui-' ($count_files_to_modify found):"
    for f_path in "${files_to_modify_list[@]}"; do
      echo "  - $f_path"
    done

    if [ "$DRY_RUN" = false ]; then
      echo "Applying 'ui-' removal in file contents..."
      for file_path_to_modify in "${files_to_modify_list[@]}"; do
        # Check if file still exists and contains 'ui-' before modifying
        if [ -f "$file_path_to_modify" ] && LC_ALL=C grep -q 'ui-' "$file_path_to_modify"; then
            log_action "modify file: $file_path_to_modify (removing all 'ui-' occurrences)"
            perl -pi -e 's/ui-//g' "$file_path_to_modify"
        else
            echo "Warning: File '$file_path_to_modify' not found or no longer contains 'ui-'. Skipping modification."
        fi
      done
    fi
  fi
  echo
}

# --- Main execution ---
# Check if libs and projects directories exist
if [ ! -d "libs" ] && [ ! -d "projects" ]; then
  echo "Error: Neither 'libs' nor 'projects' directory found in the current location."
  echo "Please run this script from the root of your monorepo."
  usage # exit 1 from usage
elif [ ! -d "libs" ]; then
  echo "Info: 'libs' directory not found. Proceeding with 'projects' directory only (if it exists)."
elif [ ! -d "projects" ]; then
  echo "Info: 'projects' directory not found. Proceeding with 'libs' directory only (if it exists)."
fi


rename_folders
replace_in_files

if [ "$DRY_RUN" = true ]; then
  echo "DRY-RUN finished. No changes were made."
  echo "Run with --force to apply all changes."
else
  echo "FORCE execution finished. Changes have been applied."
  echo "IMPORTANT: Please review the changes carefully and test your project thoroughly."
fi
