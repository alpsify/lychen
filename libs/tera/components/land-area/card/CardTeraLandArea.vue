<template>
  <div
    class="p-4 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-row gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1 overflow-hidden">
      <BaseHeading
        class="whitespace-nowrap overflow-hidden text-ellipsis"
        variant="h3"
        >{{ landArea.name }}
      </BaseHeading>
      <BadgeTeraLandAreaKind
        :kind="landArea.kind"
        class="self-start"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import type { components } from '@lychen/tera-api-sdk/generated/tera-api';
import { VARIANT, type Variant } from '.';
import BadgeTeraLandAreaKind from '../badges/kind/BadgeTeraLandAreaKind.vue';
import BaseHeading from '@lychen/vue-components-app/base-heading/BaseHeading.vue';

const { variant = VARIANT.Default, landArea } = defineProps<{
  landArea: components['schemas']['LandArea.jsonld'];
  variant?: Variant;
}>();
</script>
