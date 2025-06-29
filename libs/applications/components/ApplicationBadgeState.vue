<template>
  <Badge
    variant="tertiary"
    class="self-center"
    >{{ t(`state.${state}`) }}</Badge
  >
</template>

<script setup lang="ts">
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/applications-i18n';
import { type ApplicationState } from '@lychen/applications-model/Application';
import { APPLICATION_STATE } from '@lychen/applications-constants/ApplicationState';
import Badge from '@lychen/vue-components-core/badge/Badge.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { state = APPLICATION_STATE.Development } = defineProps<{ state: ApplicationState }>();
</script>
