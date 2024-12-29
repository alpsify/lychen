<template>
  <LychenContainer
    id="features"
    class="flex flex-col gap-8 items-stretch"
  >
    <LychenTitle variant="h2">{{ t('title') }}</LychenTitle>
    <ApplicationsGridFeatures :features />
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { OrganizedFeaturesByGroup } from '@lychen/applications-util-model/OrganizedFeaturesByGroup';
import { TRANSLATION_KEY, messages } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const ApplicationsGridFeatures = defineAsyncComponent(
  () => import('@lychen/applications-ui-components/grids/ApplicationsGridFeatures.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

defineProps<{ features: OrganizedFeaturesByGroup }>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
