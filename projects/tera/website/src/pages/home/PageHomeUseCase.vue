<template>
  <LychenContainer>
    <SharingExtraToSupportedCitizen />
  </LychenContainer>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import SharingExtraToSupportedCitizen from '@lychen/diagrams/tera/SharingExtraToSupportedCitizen.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
