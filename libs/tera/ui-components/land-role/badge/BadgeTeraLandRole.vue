<template>
  <Badge>
    {{ landRole.name }}
  </Badge>
</template>

<script setup lang="ts">
import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Badge from '@lychen/vue-ui-components-core/badge/Badge.vue';

defineProps<{ landRole: LandRoleJsonld }>();
</script>
