<template>
  <SectionTwoThird :title="t('title')">
    <div
      class="flex flex-col md:flex-row justify-between gap-4 p-4 rounded-xl bg-surface-container-highest text-on-surface-container-highest items-center"
    >
      <div class="flex flex-col">
        <BaseHeading variant="h3">Pourquoi co-jardiner ?</BaseHeading>
        <p class="text-balance opacity-80">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptatum inventore
          mollitia autem odio porro, distinctio laboriosam corporis sunt iure officiis, odit hic.
          Quam voluptates nam laborum soluta rerum veritatis!
        </p>
      </div>
      <div>
        <Button
          label="Partager mon terrain"
          :icon="faShare"
        />
      </div>
    </div>
    <div class="flex flex-col gap-4">
      <BaseHeading variant="h2">Ces espaces de culture recherches des co-jardineurs</BaseHeading>
      <div
        v-if="landProposals"
        class="flex flex-col gap-4"
      >
        <CardTeraLandProposal
          v-for="landProposal in landProposals.member"
          :key="landProposal.ulid"
          :title="landProposal.title"
          :land-name="landProposal.land?.name"
          :land-altitude="landProposal.land?.altitude"
          :land-surface="landProposal.land?.surface"
          :land-city="landProposal.land?.address?.city"
          :expiration-date="landProposal.expirationDate"
          :sharing-conditions="landProposal.sharingConditions"
          :preferred-garden-interaction-mode="landProposal.preferredGardenInteractionMode"
        />
      </div>
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
import { useQuery } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import { faShare } from '@fortawesome/pro-light-svg-icons/faShare';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { api } = useTeraApi();

const { data: landProposals } = useQuery({
  queryKey: ['landProposalsPublic'],
  queryFn: async () => {
    const response = await api.GET('/api/land_proposals/public', {});
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
