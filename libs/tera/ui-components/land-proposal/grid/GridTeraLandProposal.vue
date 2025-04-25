<template>
  <div
    v-if="queryResult"
    class="flex flex-col gap-4"
  >
    <div
      v-for="landProposal in queryResult.member"
      :key="landProposal.ulid"
    >
      <DialogTeraLandProposalView
        :key="landProposal.ulid"
        :title="landProposal.title"
        :description="landProposal.description"
        :sharing-conditions="
          (() => landProposal.sharingConditions as unknown as LandSharingCondition[])()
        "
      >
        <CardTeraLandProposal
          :title="landProposal.title"
          :land-name="landProposal.land?.name"
          :land-altitude="landProposal.land?.altitude"
          :land-surface="landProposal.land?.surface"
          :land-city="landProposal.land?.address?.city"
          :expiration-date="landProposal.expirationDate"
          :sharing-conditions="
            (() => landProposal.sharingConditions as unknown as LandSharingCondition[])()
          "
          :preferred-interaction-mode="landProposal.preferredInteractionMode"
        />
      </DialogTeraLandProposalView>
    </div>
  </div>

  <div v-else>
    <div
      v-if="status === 'pending'"
      class="flex flex-row gap-4 items-center"
    >
      <Icon
        :icon="faSpinnerThird"
        class="fa-spin"
      />
      Recherche en cours
    </div>
    <div v-else>No land proposals found.</div>
  </div>
</template>

<script setup lang="ts">
import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';
import DialogTeraLandProposalView from '@lychen/tera-ui-components/land-proposal/dialogs/view/DialogTeraLandProposalView.vue';

import { Icon } from '@lychen/vue-ui-components-core/icon';
import { faSpinnerThird } from '@fortawesome/pro-light-svg-icons/faSpinnerThird';
import type { LandSharingCondition } from '@lychen/tera-util-api-sdk/constants/LandSharingCondition';
import type { operations } from '@lychen/tera-util-api-sdk/generated/tera-api';
import type { QueryStatus } from '@tanstack/vue-query';

defineProps<{
  queryResult?: operations['land-proposal_collection-public']['responses']['200']['content']['application/ld+json'];
  status: QueryStatus;
}>();
</script>
