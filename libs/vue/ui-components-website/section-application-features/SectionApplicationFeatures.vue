<template>
  <Container
    id="features"
    class="flex flex-col gap-8 items-stretch"
  >
    <Title variant="h2">{{ t('title') }}</Title>
    <ApplicationsGridFeatures :features />
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { type OrganizedFeaturesByGroup } from '@lychen/applications-model/OrganizedFeaturesByGroup';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

const ApplicationsGridFeatures = defineAsyncComponent(
  () => import('@lychen/applications-ui-components/grids/ApplicationsGridFeatures.vue'),
);

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);

defineProps<{ features: OrganizedFeaturesByGroup }>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
