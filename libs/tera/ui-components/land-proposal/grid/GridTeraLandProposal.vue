<template>
  <div class="flex flex-row gap-4 justify-between items-center">
    <ToggleGroup
      v-model="sharingConditionFilter"
      type="multiple"
    >
      <Tooltip
        v-for="(sharingConditionOption, index) in [...LAND_SHARING_CONDITIONS].sort((a, b) =>
          a.localeCompare(b),
        )"
        :key="sharingConditionOption"
      >
        <TooltipTrigger>
          <ToggleGroupItem
            size="sm"
            class="rounded-2xl"
            :value="sharingConditionOption"
            :aria-label="sharingConditionOption"
            :style="
              sharingConditionFilter.includes(sharingConditionOption)
                ? {}
                : {
                    background: `oklch(from var(--color-surface-container-highest) l calc(c * ${index}) h)`,
                  }
            "
          >
            <Icon :icon="LAND_SHARING_CONDITION_ICON[sharingConditionOption]" />
          </ToggleGroupItem>
        </TooltipTrigger>
        <TooltipContent
          class=""
          :style="{
            background: `oklch(from var(--color-surface-container-highest) l calc(c * ${index}) h)`,
          }"
        >
          {{ t(`property.sharing_conditions.options.${sharingConditionOption}`) }}
        </TooltipContent>
      </Tooltip>
    </ToggleGroup>
    <ToggleGroup
      v-model="interactionModeFilter"
      type="multiple"
    >
      <ToggleGroupItem
        v-for="interactionModeOption in LAND_INTERACTION_MODES"
        :key="interactionModeOption"
        size="sm"
        :value="interactionModeOption"
        :aria-label="interactionModeOption"
      >
        <Icon :icon="LAND_INTERACTION_MODE_ICON[interactionModeOption]" />
      </ToggleGroupItem>
    </ToggleGroup>
  </div>
  <div
    v-if="landProposals"
    class="flex flex-col gap-4"
  >
    <div
      v-for="landProposal in landProposals.member"
      :key="landProposal.ulid"
    >
      <DialogTeraLandProposalView
        :key="landProposal.ulid"
        :title="landProposal.title"
        :description="landProposal.description"
        :sharing-conditions="
          () => landProposal.sharingConditions as unknown as LandSharingCondition[]
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
            () => landProposal.sharingConditions as unknown as LandSharingCondition[]
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
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';
import DialogTeraLandProposalView from '@lychen/tera-ui-components/land-proposal/dialogs/view/DialogTeraLandProposalView.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import { ToggleGroup, ToggleGroupItem } from '@lychen/vue-ui-components-core/toggle-group';
import { ref } from 'vue';
import { Icon } from '@lychen/vue-ui-components-core/icon';
import { faSpinnerThird } from '@fortawesome/pro-light-svg-icons/faSpinnerThird';
import {
  LAND_INTERACTION_MODES,
  type LandInteractionMode,
} from '@lychen/tera-util-api-sdk/constants/LandInteractionMode';
import { LAND_INTERACTION_MODE_ICON } from '@lychen/tera-ui-components/icons/IconLandInteractionMode';
import {
  LAND_SHARING_CONDITIONS,
  type LandSharingCondition,
} from '@lychen/tera-util-api-sdk/constants/LandSharingCondition';
import { LAND_SHARING_CONDITION_ICON } from '@lychen/tera-ui-components/icons/IconLandSharingCondition';
import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-proposal';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

export type LandProposalPublicRead =
  components['schemas']['LandProposal.jsonld-land_proposal.collection-public'];

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

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
