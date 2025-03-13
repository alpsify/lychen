<template>
  <div
    class="p-4 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-row h-full gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1">
      <BadgeTeraLandAreaKind
        :kind="landArea.kind"
        class="self-start"
      />
      <span class="whitespace-nowrap overflow-hidden text-ellipsis text-sm"
        >{{ landArea.name }}
      </span>
    </div>
  </div>
</template>

<script lang="ts" setup>
import type { LandAreaJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { VARIANT, type Variant } from '.';
import BadgeTeraLandAreaKind from '../../badge/land-area-kind/BadgeTeraLandAreaKind.vue';

const { variant = VARIANT.Default, landArea } = defineProps<{
  landArea: LandAreaJsonld;
  variant?: Variant;
}>();
</script>
