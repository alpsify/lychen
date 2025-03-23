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
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import { faCircleDashed } from '@fortawesome/pro-light-svg-icons';
import { LandTaskState } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ state: LandTaskState }>();

const classes = {
  [LandTaskState.to_be_done]: 'bg-surface-container-high text-on-surface-container-high',
  [LandTaskState.in_progress]: 'bg-secondary text-on-secondary',
  [LandTaskState.done]: 'bg-positive text-on-positive',
};
</script>
