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
      <div class="flex flex-row gap-4 justify-between items-center">
        <ToggleGroupTeraLandSharingConditions v-model="sharingConditionFilter" />
        <ToggleGroupTeraLandInteractionMode v-model="interactionModeFilter" />
      </div>
      <GridTeraLandProposal
        :status="status"
        :query-result="landProposals"
      />
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

import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import BannerTeraShareYourLand from '@components/banners/BannerTeraShareYourLand.vue';
import { RoutePageCoGardeningProposals } from '../proposals';
import GridTeraLandProposal from '@lychen/tera-ui-components/land-proposal/grid/GridTeraLandProposal.vue';
import ToggleGroupTeraLandSharingConditions from '@lychen/tera-ui-components/land-sharing-condition/ToggleGroupTeraLandSharingConditions.vue';
import ToggleGroupTeraLandInteractionMode from '@lychen/tera-ui-components/land-interaction-mode/ToggleGroupTeraLandInteractionMode.vue';
import { type LandInteractionMode } from '@lychen/tera-api-sdk/constants/LandInteractionMode';
import { type LandSharingCondition } from '@lychen/tera-api-sdk/constants/LandSharingCondition';
import { useTeraApi } from '@lychen/tera-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { ref } from 'vue';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { api } = useTeraApi();

const interactionModeFilter = ref<LandInteractionMode[]>([]);
const sharingConditionFilter = ref<LandSharingCondition[]>([]);

const { data: landProposals, status } = useQuery({
  queryKey: ['landProposalsPublic', interactionModeFilter, sharingConditionFilter],
  queryFn: async () => {
    const response = await api.GET('/api/land_proposals/public', {
      params: {
        query: {
          'preferredInteractionMode[]': interactionModeFilter.value,
          'sharingConditions[]': sharingConditionFilter.value,
        },
      },
    });
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
