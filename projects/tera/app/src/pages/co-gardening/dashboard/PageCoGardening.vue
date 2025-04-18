<template>
  <SectionTwoThird :title="t('title')">
    <BannerTeraShareYourLand />
    <div class="flex flex-col gap-4">
      <div class="flex flex-row gap-4 items-center justify-between">
        <BaseHeading variant="h2">Ces espaces de culture recherches des co-jardineurs</BaseHeading>
        <RouterLink :to="RoutePageCoGardeningProposals">
          <Button
            :icon="faListUl"
            size="sm"
            variant="ghost"
          />
        </RouterLink>
      </div>
      <GridTeraLandProposal />
    </div>
    <div class="flex flex-col gap-2">
      <BaseHeading variant="h2">Rechercher sur la carte</BaseHeading>
      <SectionDevelopmentInProgress />
    </div>
    <template #side>
      <div>
        <BaseHeading>Vous recherchez un terrain ?</BaseHeading>
        <p>Dîte nous ce que vous recherchez on s'occupe de diffuser votre demande.</p>
      </div>
    </template>
  </SectionTwoThird>
</template>

<script lang="ts" setup>
import SectionTwoThird from '@lychen/vue-ui-components-app/section-two-third/SectionTwoThird.vue';
import SectionDevelopmentInProgress from '@lychen/vue-ui-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';

import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import BannerTeraShareYourLand from '@components/banners/BannerTeraShareYourLand.vue';
import { RoutePageCoGardeningProposals } from '../proposals';
import GridTeraLandProposal from '@lychen/tera-ui-components/land-proposal/grid/GridTeraLandProposal.vue';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});
</script>

<style lang="css" scoped></style>
