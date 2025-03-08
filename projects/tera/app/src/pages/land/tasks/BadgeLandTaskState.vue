<template>
  <Badge>{{ state }}</Badge>
</template>

<script setup lang="ts">
import type { LandTaskStateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { Badge } from '@lychen/vue-ui-components-core/badge';

defineProps<{ state: LandTaskStateEnum }>();
</script>
