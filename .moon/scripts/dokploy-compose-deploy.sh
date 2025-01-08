#!/bin/bash

while getopts i: flag
do
    case "${flag}" in
        i) composeId=${OPTARG};;
    esac
done

echo '> Deploy through Dokploy API'
curl -X POST "${DOKPLOY_API_URL}/compose.deploy" \
  -H "accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer ${DOKPLOY_API_TOKEN}" \
  -d "{\"composeId\": \"$composeId\"}"
echo '> Deployed'
