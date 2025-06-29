<template>
  <div
    v-if="sharingConditions"
    class="flex"
    :class="display === DISPLAY.Horizontal ? 'flex-row' : 'flex-col'"
  >
    <div
      v-for="(condition, index) in [...sharingConditions].sort((a, b) => a.localeCompare(b))"
      :key="condition"
      class="flex items-center gap-2 p-2 rounded-2xl bg-surface-container-highest self-start"
      :class="`z-${index} ${iconsBorderClass} ${display === DISPLAY.Horizontal ? '-ml-2' : ''}`"
      :style="{
        background: `oklch(from var(--color-surface-container-highest) l calc(c * ${index}) h)`,
      }"
    >
      <Icon :icon="LAND_SHARING_CONDITION_ICON[condition]" />
      <span v-if="displayLabel && display === DISPLAY.Vertical">{{
        t(`property.sharing_conditions.options.${condition}`)
      }}</span>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-i18n/land-proposal';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { type Display, DISPLAY } from '.';
import { type LandSharingCondition } from '@lychen/tera-api-sdk/constants/LandSharingCondition';
import { LAND_SHARING_CONDITION_ICON } from '@lychen/tera-components/icons/IconLandSharingCondition';

const Icon = defineAsyncComponent(() => import('@lychen/vue-components-core/icon/Icon.vue'));

const {
  display = DISPLAY.Horizontal,
  sharingConditions = [],
  iconsBorderClass = 'border-3 border-surface-container-low',
  displayLabel = false,
} = defineProps<{
  display?: Display;
  sharingConditions?: LandSharingCondition[] | null;
  iconsBorderClass?: string;
  displayLabel?: boolean;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
