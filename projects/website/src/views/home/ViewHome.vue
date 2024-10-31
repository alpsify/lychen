<template>
  <ViewHomeHero />
  <ViewHomeDefinition />
  <ViewHomeFeatures />
  <ViewHomePresentation />
  <ViewHomeActors />
</template>

<script lang="ts" setup>
import { useHead } from '@unhead/vue';

import { useTranslations } from './i18n';
import ViewHomeActors from './ViewHomeActors.vue';
import ViewHomeDefinition from './ViewHomeDefinition.vue';
import ViewHomeFeatures from './ViewHomeFeatures.vue';
import ViewHomeHero from './ViewHomeHero.vue';
import ViewHomePresentation from './ViewHomePresentation.vue';

const { t } = useTranslations();

useHead({
  title: t('meta.title'),
});
</script>

<style lang="css" scoped></style>
