<template>
  <SectionWithTitle :title="t('title')">
    <div
      class="bg-gradient-to-tr from-tertiary-container to-tertiary-container/70 p-8 rounded-xl flex flex-col gap-4"
    >
      <BaseHeading variant="h2">{{ t('banner.title') }}</BaseHeading>
      <p class="lg:w-2/3">
        {{ t('banner.description') }}
      </p>
    </div>
    <div>
      <BaseHeading variant="h2">
        {{ t('global.title') }}
      </BaseHeading>
      <p>{{ t('global.description') }}</p>
    </div>
    <div>
      <BaseHeading variant="h2">
        {{ t('custom.title') }}
      </BaseHeading>
      <p>{{ t('custom.description') }}</p>
    </div>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
