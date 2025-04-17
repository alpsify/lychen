<template>
  <SectionTwoThird :title="t('title')">
    <div>
      <BaseHeading>Déposer une annonces</BaseHeading>
      <p>Dîte nous ce que vous recherchez on s'occupe du reste</p>
    </div>
    <div class="flex flex-col gap-4">
      <BaseHeading>Les espaces de culture qui recherche des co-jardineurs</BaseHeading>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua.
      </p>
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
          :expiration-date="landProposal.expirationDate"
          :sharing-conditions="landProposal.sharingConditions"
          :preferred-garden-interaction-mode="landProposal.preferredGardenInteractionMode"
        />
      </div>
    </div>
  </SectionTwoThird>
</template>

<script lang="ts" setup>
import SectionTwoThird from '@lychen/vue-ui-components-app/section-two-third/SectionTwoThird.vue';

import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import { useQuery } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';

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
