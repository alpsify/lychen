#!/bin/bash

# Script to recursively remove 'util-' and 'ui-' prefixes from folder names.

# Default to dry-run mode. Set to 0 to perform actual renaming.
DRY_RUN=1
VERBOSE=0

# Function to show usage
usage() {
  echo "Usage: $0 [-f] [-v]"
  echo "  Recursively renames folders by removing 'util-' and 'ui-' prefixes."
  echo
  echo "Options:"
  echo "  -f  Force actual renaming. Default is dry-run (show changes only)."
  echo "  -v  Verbose mode. Prints detailed information about operations."
  echo "  -h  Show this help message."
  exit 1
}

# Parse command-line options
while getopts "fvh" opt; do
  case $opt in
    f) DRY_RUN=0 ;;
    v) VERBOSE=1 ;;
    h) usage ;;
    *) usage ;;
  esac
done

if [ "$DRY_RUN" -eq 1 ]; then
  echo "Running in DRY-RUN mode. No actual changes will be made."
  echo "Use -f option to apply changes."
  echo "-----------------------------------------------------"
fi

# Find directories and process them.
# -depth ensures that we process contents of a directory before the directory itself.
# This is crucial if a parent directory is also being renamed (e.g., util-parent/util-child).
# -print0 and read -d $'\0' handle names with spaces, newlines, or other special characters.
find . -depth -type d \( -name "util-*" -o -name "ui-*" \) -print0 | while IFS= read -r -d $'\0' dir_path; do
  # Skip the current directory "." if it somehow matches (though -name usually prevents this for ".")
  if [ "$dir_path" == "." ]; then
    continue
  fi

  parent_dir=$(dirname "$dir_path")
  old_name=$(basename "$dir_path")
  new_name=""

  if [[ "$old_name" == util-* ]]; then
    new_name="${old_name#util-}"
  elif [[ "$old_name" == ui-* ]]; then
    new_name="${old_name#ui-}"
  else
    # This case should ideally not be reached due to the 'find' command's filtering
    if [ "$VERBOSE" -eq 1 ]; then
      echo "[VERBOSE] Skipping '$dir_path': Name does not match util-* or ui-* (unexpected)."
    fi
    continue
  fi

  # Ensure new_name is not empty (e.g., if folder was just "util-" or "ui-")
  # and not problematic (e.g. "." or "..")
  if [ -z "$new_name" ] || [ "$new_name" == "." ] || [ "$new_name" == ".." ]; then
    if [ "$VERBOSE" -eq 1 ] || [ "$DRY_RUN" -eq 1 ]; then
      echo "[INFO] Skipping rename of '$dir_path': Resulting name ('$new_name') is invalid or empty."
    fi
    continue
  fi

  new_path="$parent_dir/$new_name"

  if [ "$VERBOSE" -eq 1 ] || [ "$DRY_RUN" -eq 1 ]; then
    echo "Plan to rename: '$dir_path' -> '$new_path'"
  fi

  if [ "$DRY_RUN" -eq 0 ]; then
    # Check for collision before renaming
    if [ -e "$new_path" ]; then
      echo "[ERROR] Target '$new_path' already exists. Skipping rename of '$dir_path'."
      continue
    fi

    # Perform the rename
    if mv "$dir_path" "$new_path"; then
      if [ "$VERBOSE" -eq 1 ]; then
        echo "[SUCCESS] Renamed '$dir_path' to '$new_path'"
      fi
    else
      echo "[ERROR] Failed to rename '$dir_path' to '$new_path'. Check permissions or other issues."
    fi
  fi
done

echo "-----------------------------------------------------"
echo "Script finished."
if [ "$DRY_RUN" -eq 1 ]; then
  echo "Dry-run complete. No changes were made. Run with -f to apply changes."
fi