<template>
  <LychenBadge
    variant="tertiary"
    class="self-center"
    >{{ t(`state.${state}`) }}</LychenBadge
  >
</template>

<script setup lang="ts">
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/applications-ui-i18n';
import { ApplicationState } from '@lychen/applications-util-model/Application';
import { APPLICATION_STATE } from '@lychen/applications-util-constants/ApplicationState';
import LychenBadge from '@lychen/ui-components/badge/LychenBadge.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { state = APPLICATION_STATE.Development } = defineProps<{ state: ApplicationState }>();
</script>
