#!/bin/bash

echo '> Get content from' $COMPOSE_FILE
composeContent=$(<$COMPOSE_FILE)
escapedComposeContent=$(jq -Rs . <<< "$composeContent")

echo '> Update through Dokploy API'
curl -X POST "${DOKPLOY_API_URL}/compose.update" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer ${DOKPLOY_API_TOKEN}" \
  -d "{\"composeId\": \"${DOKPLOY_COMPOSE_ID}\", \"composeFile\": $escapedComposeContent}"
