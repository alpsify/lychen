<template>
  <Container>
    <SharingExtraToSupportedCitizen />
  </Container>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import Container from '@lychen/vue-components-website/container/Container.vue';
import SharingExtraToSupportedCitizen from '@lychen/vue-drawio-tera/SharingExtraToSupportedCitizen.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
