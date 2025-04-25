<template>
  <div
    :class="classes[state]"
    class="flex flex-row items-center rounded-md px-2 uppercase py-1 text-xs gap-2"
  >
    {{ t(`property.state.${state}`) }}
  </div>
</template>

<script setup lang="ts">
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member-invitation';
import { LandMemberInvitationJsonldState as State } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ state: State }>();

const classes = {
  [State.pending]: 'bg-surface-container-high text-on-surface-container-high',
  [State.refused]: 'bg-negative text-on-negative',
  [State.accepted]: 'bg-positive text-on-positive',
};
</script>
