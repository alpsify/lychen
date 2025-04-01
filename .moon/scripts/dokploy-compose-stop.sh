#!/bin/bash

while getopts i: flag
do
    case "${flag}" in
        i) composeId=${OPTARG};;
    esac
done

echo '> Stop' $composeId 'through Dokploy API'
curl -X POST "${DOKPLOY_API_URL}/compose.stop" \
  -H "accept: application/json" \
  -H "Content-Type: application/json" \
  -H "x-api-key: ${DOKPLOY_API_TOKEN}" \
  -d "{\"composeId\": \"$composeId\"}"
echo '> Stopped'
