<template>
  <PageManifestHero />
  <PageManifestContent />
</template>

<script lang="ts" setup>
import { useTranslations } from './i18n';
import { useExtendedHead } from '@/composables/useExtendedHead';
import { defineAsyncComponent } from 'vue';

const PageManifestHero = defineAsyncComponent(() => import('./PageManifestHero.vue'));
const PageManifestContent = defineAsyncComponent(() => import('./PageManifestContent.vue'));

const { t } = useTranslations();

useExtendedHead(t);
</script>

<style lang="css" scoped></style>
