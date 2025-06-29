#!/bin/bash

# This script finds and deletes tsconfig.json files within the 'projects' and 'libs' directories.
# By default, it performs a dry run, listing the files that would be deleted.
# To perform the actual deletion, run the script with the --delete flag.

set -e # Exit immediately if a command exits with a non-zero status.

# --- Configuration ---
SEARCH_DIRS=("projects" "libs")
FILENAME="tsconfig.json"
DELETE_MODE=false

# --- Argument Parsing ---
if [[ "$1" == "--delete" ]]; then
    DELETE_MODE=true
elif [[ -n "$1" ]]; then
    echo "Error: Unknown argument '$1'."
    echo "Usage: $0 [--delete]"
    exit 1
fi

# --- Main Logic ---

if [ "$DELETE_MODE" = true ]; then
    echo "--- Deletion Mode ---"
    echo "WARNING: This will permanently delete files."
else
    echo "--- Dry Run Mode ---"
    echo "The following files would be deleted. Use the --delete flag to proceed with deletion."
fi

echo

# Find all files matching the name in the specified directories
# Using -print0 and a while loop to handle filenames with spaces
files_to_process=()
while IFS= read -r -d $'\0'; do
    files_to_process+=("$REPLY")
done < <(find "${SEARCH_DIRS[@]}" -type f -name "$FILENAME" -print0 2>/dev/null)

if [ ${#files_to_process[@]} -eq 0 ]; then
    echo "No '$FILENAME' files found in the specified directories."
    exit 0
fi

for file in "${files_to_process[@]}"; do
    if [ "$DELETE_MODE" = true ]; then
        echo "Deleting: $file"
        rm "$file"
    else
        echo "  - $file"
    fi
done

echo
echo "Operation complete. Found and processed ${#files_to_process[@]} files."

