#!/usr/bin/env bash
set -eo pipefail

# Automatically generated by moon. DO NOT MODIFY!
# https://moonrepo.dev/docs/guides/vcs-hooks

moon :format-fix --affected --logFile .moon/logs/pre-commit-format-fix.txt --log trace
moon :lint-fix --affected
git add -u

