<template>
  <section>
    <BaseHeading variant="h1">
      {{ t('title') }}
    </BaseHeading>
    <GridTeraLandProposal />
  </section>
</template>

<script lang="ts" setup>
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import GridTeraLandProposal from '@lychen/tera-ui-components/land-proposal/grid/GridTeraLandProposal.vue';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});
</script>

<style lang="css" scoped></style>
