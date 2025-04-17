<template>
  <Badge
    :class="classes[state]"
    class="uppercase"
  >
    <Icon :icon="faCircleDashed" />
    {{ t(state) }}
  </Badge>
</template>

<script lang="ts" setup>
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import Badge from '@lychen/vue-ui-components-core/badge/Badge.vue';
import { faCircleDashed } from '@fortawesome/pro-light-svg-icons';
import { LandTaskJsonldState as State } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ state: State }>();

const classes = {
  [State.to_be_done]: 'bg-surface-container-high text-on-surface-container-high',
  [State.in_progress]: 'bg-secondary text-on-secondary',
  [State.done]: 'bg-positive text-on-positive',
};
</script>
