<template>
  <Card
    hoverable
    class="grid md:grid-cols-[auto_1fr_auto_auto] gap-4 items-center"
  >
    <div class="bg-surface-container-high rounded-full size-12 flex items-center justify-center">
      <Icon
        :icon="faFence"
        class="p-2"
      />
    </div>

    <div class="flex flex-col">
      <div class="flex flex-row gap-2">
        <Badge
          v-if="landCity"
          size="sm"
          variant="outline"
        >
          <Icon :icon="faMapLocation" />
          {{ landCity }}
        </Badge>
        <!-- Updated Badge for expiration date -->
        <Badge
          v-if="expirationDate"
          size="sm"
          :variant="isCloseToExpire ? 'warning' : undefined"
        >
          <Icon :icon="faClock" />
          {{ d(expirationDate, 'short') }}
        </Badge>
      </div>
      <BaseHeading variant="h3">{{ title }}</BaseHeading>
      <div class="flex flex-row gap-2 opacity-70">
        <p>{{ landName }}</p>
        <p v-if="landSurface">• {{ tLand('property.surface.default', landSurface) }}</p>
        <p v-if="landAltitude">
          •
          <Icon :icon="faMountains" />
          {{ tLand('property.altitude.default', landAltitude) }}
        </p>
      </div>
    </div>

    <TeraLandProposalSharingConditions
      v-if="sharingConditions"
      :sharing-conditions="sharingConditions"
    />

    <div>
      <Tooltip>
        <TooltipTrigger>
          <Icon
            v-if="preferredInteractionMode"
            :icon="LAND_INTERACTION_MODE_ICON[preferredInteractionMode]"
            class="p-2"
          />
        </TooltipTrigger>
        <TooltipContent>
          {{ t(`property.preferred_interaction_mode.options.${preferredInteractionMode}`) }}
        </TooltipContent>
      </Tooltip>
    </div>
  </Card>
</template>

<script lang="ts" setup>
// Import computed from vue and date utilities
import { defineAsyncComponent, computed } from 'vue';
import { today, getLocalTimeZone, parseDate } from '@internationalized/date';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-proposal';
import {
  messages as landMessages,
  TRANSLATION_KEY as LAND_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { faMountains } from '@fortawesome/pro-light-svg-icons/faMountains';
import { faMapLocation } from '@fortawesome/pro-light-svg-icons/faMapLocation';
import { faClock } from '@fortawesome/pro-light-svg-icons/faClock';
import { faFence } from '@fortawesome/pro-light-svg-icons/faFence';
import TeraLandProposalSharingConditions from '../../common/sharing-conditions-icons/TeraLandProposalSharingConditions.vue';
import { LAND_INTERACTION_MODE_ICON } from '../../icons/IconLandInteractionMode';
import type { LandInteractionMode } from '@lychen/tera-util-api-sdk/constants/LandInteractionMode';
import type { LandSharingCondition } from '@lychen/tera-util-api-sdk/constants/LandSharingCondition';

const Card = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/card/Card.vue'));

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-app/base-heading/BaseHeading.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));
const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

// Define props
const props = defineProps<{
  title?: string;
  landName?: string;
  landSurface?: number | null;
  landAltitude?: number | null;
  landCity?: string | null;
  expirationDate?: string | null; // Expecting 'YYYY-MM-DD' format
  preferredInteractionMode?: LandInteractionMode;
  sharingConditions?: LandSharingCondition[] | null;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLand } = useI18nExtended({
  messages: landMessages,
  rootKey: LAND_TRANSLATION_KEY,
  prefixed: true,
});

// Computed property to check if the expiration date is close
const isCloseToExpire = computed(() => {
  if (!props.expirationDate) {
    return false;
  }
  try {
    const expiration = parseDate(props.expirationDate);
    const now = today(getLocalTimeZone());
    const differenceInDays = expiration.compare(now);
    return differenceInDays >= 0 && differenceInDays <= 3;
  } catch (error) {
    return false;
  }
});
</script>
