#!/bin/bash

# Script to search for a needle in folder names recursively and remove it.
# By default, runs in dry-run mode. Use -f to apply changes.

set -u # Exit on unset variables

# --- Configuration ---
APP_NAME=$(basename "$0")

# --- Functions ---
usage() {
  echo "Usage: $APP_NAME -n <needle> [-f]"
  echo ""
  echo "Recursively searches for folders within the current directory whose names"
  echo "contain the <needle> and renames them by removing the <needle>."
  echo ""
  echo "Arguments:"
  echo "  -n <needle>   The string to search for and remove from folder names."
  echo "                  Note: Glob characters (e.g., '*') in the needle will be active"
  echo "                  during the replacement part of the operation."
  echo "  -f            Force mode. Actually performs the renames."
  echo "                  Without this flag, the script runs in dry-run mode,"
  echo "                  showing what changes would be made."
  echo ""
  echo "Example:"
  echo "  $APP_NAME -n \"util-\""
  echo "  (This will dry-run: 'tera-util-api-sdk' would become 'tera-api-sdk')"
  echo ""
  echo "  $APP_NAME -n \"util-\" -f"
  echo "  (This will execute: 'tera-util-api-sdk' becomes 'tera-api-sdk')"
  exit 1
}

# --- Argument Parsing ---
dry_run=true
needle=""

while getopts ":n:f" opt; do
  case $opt in
    n)
      needle="$OPTARG"
      ;;
    f)
      dry_run=false
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

# Validate that needle is provided
if [ -z "$needle" ]; then
  echo "Error: The -n <needle> argument is mandatory." >&2
  usage
fi

# --- Main Logic ---
if [ "$dry_run" = true ]; then
  echo "--- DRY RUN MODE --- (No changes will be made)"
else
  echo "--- ACTIVE MODE --- (Changes WILL be made)"
fi
echo "Searching for folders containing \"$needle\" in their name and removing it..."
echo ""

processed_count=0
renamed_count=0

find . -mindepth 1 -depth -type d | while IFS= read -r current_dir_path; do
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

    if [ -e "$new_full_path" ]; then
        echo "[SKIP] Renaming '$current_dir_path' to '$new_full_path': Target already exists."
        continue
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

echo ""
echo "--- Run Complete ---"
echo "Processed $processed_count folder(s) that matched the criteria."
[ "$dry_run" = false ] && echo "Successfully renamed $renamed_count folder(s)."

exit 0