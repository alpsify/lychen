<template>
  <div
    :class="classes[state]"
    class="flex flex-row items-center rounded-md px-2 uppercase py-1 text-xs gap-2"
  >
    <Icon :icon="faCircleDashed" />
    {{ t(state) }}
  </div>
</template>

<script lang="ts" setup>
import { LandTaskStateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import { faCircleDashed } from '@fortawesome/pro-light-svg-icons';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ state: LandTaskStateEnum }>();

const classes = {
  [LandTaskStateEnum.ToBeDone]: 'bg-surface-container-high text-on-surface-container-high',
  [LandTaskStateEnum.InProgress]: 'bg-secondary text-on-secondary',
  [LandTaskStateEnum.Done]: 'bg-positive text-on-positive',
};
</script>
