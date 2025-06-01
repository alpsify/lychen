#!/bin/bash

# Script to search for a needle in folder names recursively and remove it.
# By default, runs in dry-run mode. Use -f to apply changes.

set -u # Exit on unset variables

# --- Configuration ---
APP_NAME=$(basename "$0")

# --- Functions ---
usage() {
  echo "Usage: $APP_NAME [-n <needle>] [-D] [-f] [-o]"
  echo ""
  echo "Recursively searches for folders within the current directory whose names"
  echo "contain the <needle> and renames them by removing the <needle>."
  echo ""
  echo "Arguments:"
  echo "  -n <needle>   The string to search for and remove from folder names."
  echo "                  Note: Glob characters (e.g., '*') in the needle will be active"
  echo "                  during the replacement part of the operation."
  echo "  -D            Delete dependency directories. Recursively finds and deletes all"
  echo "                  'node_modules' and 'vendor' folders. Requires -f to execute."
  echo "  -f            Force mode. Actually performs the renames."
  echo "                  Without this flag, the script runs in dry-run mode,"
  echo "                  showing what changes would be made."
  echo "  -o            Overwrite mode. If the target folder (after removing the needle)"
  echo "                  already exists, it will be deleted before renaming."
  echo "                  This option requires -f to take effect (i.e., it does not delete in dry-run mode)."
  echo "                  Use with extreme caution as this involves 'rm -rf'."
  echo ""
  echo "Example:"
  echo "  $APP_NAME -n \"\"          (Dry-run: rename folders containing '')"
  echo "  (This will dry-run: 'tera-api-sdk' would become 'tera-api-sdk')"
  echo ""
  echo "  $APP_NAME -D                  (Dry-run: delete 'node_modules' and 'vendor' folders)"
  echo ""
  echo "  $APP_NAME -D -f               (Execute: delete 'node_modules' and 'vendor' folders)"
  echo ""
  echo "  $APP_NAME -n \"\" -f       (Execute: rename folders containing '')"
  echo "  (This will execute: 'tera-api-sdk' becomes 'tera-api-sdk')"
  exit 1
}

# --- Argument Parsing ---
dry_run=true
needle=""
overwrite_existing=false
delete_dep_dirs=false

while getopts ":n:foD" opt; do
  case $opt in
    n)
      needle="$OPTARG"
      ;;
    f)
      dry_run=false
      ;;
    o)
      overwrite_existing=true
      ;;
    D)
      delete_dep_dirs=true
      ;;
    \?)
      echo "Error: Invalid option -$OPTARG" >&2
      usage
      ;;
    :)
      echo "Error: Option -$OPTARG requires an argument." >&2
      usage
      ;;
  esac
done

# Validate that at least one action is requested
if [ "$delete_dep_dirs" = false ] && [ -z "$needle" ]; then
  echo "Error: No action specified. Use -n <needle> to rename folders, or -D to delete dependency directories." >&2
  usage
fi

# --- Initial Mode Announcement ---
if [ "$dry_run" = true ]; then
  echo "--- DRY RUN MODE --- (No changes will be made)"
else
  echo "--- ACTIVE MODE --- (Changes WILL be made)"
fi
echo ""

processed_count=0
renamed_count=0
deleted_count=0
dep_dirs_deleted_count=0

# --- Dependency Directory Deletion ---
if [ "$delete_dep_dirs" = true ]; then
  echo "--- Dependency Directory Deletion ---"
  if [ "$dry_run" = true ]; then
    echo "Searching for 'node_modules' and 'vendor' folders to report for deletion (dry run)..."
  else
    echo "Searching for 'node_modules' and 'vendor' folders for actual deletion..."
  fi

  # Find directories named "node_modules" or "vendor"
  # -print0 and read -d $'\0' handle names with spaces/special chars
  find . -type d \( -name "node_modules" -o -name "vendor" \) -print0 | while IFS= read -r -d $'\0' dir_to_delete; do
    if [ "$dry_run" = true ]; then
      echo "[DRY RUN] Would delete directory: '$dir_to_delete'"
      ((dep_dirs_deleted_count++)) # Count what would be deleted for dry run summary
    else
      echo "Attempting to delete directory: '$dir_to_delete'..."
      if rm -rf -- "$dir_to_delete"; then
        echo "[SUCCESS] Deleted directory: '$dir_to_delete'"
        ((dep_dirs_deleted_count++))
      else
        rm_exit_status=$?
        echo "[FAIL] Failed to delete directory '$dir_to_delete'. 'rm' exited with status $rm_exit_status." >&2
      fi
    fi
  done
  echo "Dependency directory deletion scan complete."
  echo ""
fi

# --- Folder Renaming Logic ---
if [ -n "$needle" ]; then
  echo "--- Folder Renaming by Removing Needle ---"
  echo "Searching for folders containing \"$needle\" in their name and removing it..."
  echo ""

  # Find directories for renaming.
  # Exclude .moon/cache, node_modules, and vendor directories and their contents.
  find . -mindepth 1 \
    \( -path "./.moon/cache" -o -name "node_modules" -o -name "vendor" \) -type d -prune \
    -o \
    -depth -type d -print | while IFS= read -r current_dir_path; do
    original_basename=$(basename -- "$current_dir_path")
    parent_path=$(dirname -- "$current_dir_path")

    if [[ "$original_basename" != *"$needle"* ]]; then
        continue
    fi

    ((processed_count++))
    new_basename="${original_basename//$needle/}"

    if [ -z "$new_basename" ]; then
        echo "[SKIP] Renaming '$current_dir_path': Removing '$needle' from '$original_basename' results in an empty name."
        continue
    fi

    if [ "$new_basename" == "$original_basename" ]; then
        echo "[INFO] No change for '$current_dir_path': Basename '$original_basename' remains unchanged after attempting to remove '$needle'."
        continue
    fi

    new_full_path="$parent_path/$new_basename"

    # Check if the target path already exists
    if [ -e "$new_full_path" ]; then
        if [ "$overwrite_existing" = true ]; then
            if [ "$dry_run" = true ]; then
                echo "[DRY RUN] Existing target '$new_full_path' would be deleted before renaming '$current_dir_path'."
            else
                echo "Attempting to delete existing target '$new_full_path' to make way for '$current_dir_path'..."
                if rm -rf -- "$new_full_path"; then
                    echo "[SUCCESS] Deleted existing target '$new_full_path'."
                    ((deleted_count++))
                else
                    rm_exit_status=$?
                    echo "[FAIL] Failed to delete existing target '$new_full_path'. 'rm' exited with status $rm_exit_status." >&2
                    echo "[SKIP] Renaming '$current_dir_path' due to failure in deleting existing target."
                    continue # Skip renaming this one
                fi
            fi
        else # Target exists, and overwrite_existing is false
            echo "[SKIP] Renaming '$current_dir_path' to '$new_full_path': Target already exists. Use -o to enable deletion of the existing target."
            continue
        fi
    fi

    if [ "$dry_run" = true ]; then
        echo "[DRY RUN] Would rename '$current_dir_path' to '$new_full_path'"
    else
        echo "Attempting rename: '$current_dir_path' -> '$new_full_path'"
        if mv -- "$current_dir_path" "$new_full_path"; then
            echo "[SUCCESS] Renamed '$current_dir_path' to '$new_full_path'"
            ((renamed_count++))
        else
            mv_exit_status=$?
            echo "[FAIL] Failed to rename '$current_dir_path' to '$new_full_path'. 'mv' exited with status $mv_exit_status." >&2
        fi
    fi
  done
  echo "Folder renaming scan complete."
fi

echo ""
echo "--- Run Complete ---"
if [ -n "$needle" ]; then
  echo "Folder Renaming Summary:"
  echo "  Processed $processed_count folder(s) that matched the renaming criteria (contained '$needle')."
fi
if [ "$delete_dep_dirs" = true ] && [ "$dry_run" = true ]; then
    echo "Dependency Deletion Dry Run Summary: Would have attempted to delete $dep_dirs_deleted_count 'node_modules' or 'vendor' folder(s)."
fi

if [ "$dry_run" = false ]; then
  [ -n "$needle" ] && echo "  Successfully renamed $renamed_count folder(s)."
  [ -n "$needle" ] && [ "$overwrite_existing" = true ] && [ "$deleted_count" -gt 0 ] && echo "  Successfully deleted $deleted_count pre-existing target folder(s) during renaming."
  [ "$delete_dep_dirs" = true ] && echo "Dependency Deletion Summary: Successfully deleted $dep_dirs_deleted_count 'node_modules' or 'vendor' folder(s)."
  fi

exit 0