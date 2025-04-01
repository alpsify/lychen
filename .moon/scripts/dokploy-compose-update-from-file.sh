#!/bin/bash

set -euo pipefail

echo "> Get content from $COMPOSE_FILE"
if [ ! -f "$COMPOSE_FILE" ]; then
  echo "Error: Compose file not found: $COMPOSE_FILE" >&2
  exit 1
fi

composeContent=$(<$COMPOSE_FILE)
if [ -z "$composeContent" ]; then
  echo "Error: Compose file is empty: $COMPOSE_FILE" >&2
  exit 1
fi

escapedComposeContent=$(jq -Rs . <<< "$composeContent")
if [ $? -ne 0 ]; then
  echo "Error: Failed to escape compose content with jq" >&2
  exit 1
fi

echo "> Update through Dokploy API"
response=$(curl -X POST "${DOKPLOY_API_URL}/compose.update" \
  -H "Content-Type: application/json" \
  -H "x-api-key: ${DOKPLOY_API_TOKEN}" \
  -d "{\"composeId\": \"${DOKPLOY_COMPOSE_ID}\", \"composeFile\": $escapedComposeContent}")

if [ $? -ne 0 ]; then
  echo "Error: Failed to update compose through Dokploy API" >&2
  echo "Response: $response" >&2
  exit 1
fi

# Check for error in the response body
if echo "$response" | jq -e '.error'; then
  echo "Error: Dokploy API returned an error" >&2
  echo "Response: $response" >&2
  exit 1
fi

echo "> Compose updated successfully"