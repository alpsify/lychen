<template>
  <Badge class="bg-tertiary-container text-on-tertiary-container">
    {{ landRole.name }}
  </Badge>
</template>

<script setup lang="ts">
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import Badge from '@lychen/vue-ui-components-core/badge/Badge.vue';

defineProps<{ landRole: Pick<components['schemas']['LandRole.jsonld'], 'name'> }>();
</script>
