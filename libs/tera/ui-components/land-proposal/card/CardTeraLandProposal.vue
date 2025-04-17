<template>
  <Card
    hoverable
    class="grid md:grid-cols-[1fr_auto_auto] gap-4 items-center"
  >
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
        <Badge
          v-if="expirationDate"
          size="sm"
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

    <div
      v-if="sharingConditions"
      class="flex flex-row"
    >
      <div
        v-for="(condition, index) in [...sharingConditions].sort((a, b) => a.localeCompare(b))"
        :key="condition"
      >
        <Icon
          :icon="LAND_SHARING_CONDITION[condition]"
          class="p-2 rounded-2xl bg-surface-container-highest border-3 -ml-2 border-surface-container-low"
          :class="`z-${index}`"
          :style="{
            background: `oklch(from var(--color-surface-container-highest) l calc(c * ${index}) h)`,
          }"
        />
      </div>
    </div>

    <div>
      <Tooltip>
        <TooltipTrigger>
          <Icon
            v-if="preferredGardenInteractionMode"
            :icon="LAND_INTERACTION_MODE[preferredGardenInteractionMode]"
            class="p-2"
          />
        </TooltipTrigger>
        <TooltipContent>
          {{
            t(
              `property.preferred_garden_interaction_mode.options.${preferredGardenInteractionMode}`,
            )
          }}
        </TooltipContent>
      </Tooltip>
    </div>
  </Card>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-proposal';
import {
  messages as landMessages,
  TRANSLATION_KEY as LAND_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  LAND_INTERACTION_MODE,
  LAND_SHARING_CONDITION,
  type LandInteractionMode,
  type LandSharingCondition,
} from '../../icons';

import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { faMountains } from '@fortawesome/pro-light-svg-icons/faMountains';
import { faMapLocation } from '@fortawesome/pro-light-svg-icons/faMapLocation';
import { faClock } from '@fortawesome/pro-light-svg-icons/faClock';

const Card = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/card/Card.vue'));

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-app/base-heading/BaseHeading.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));
const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

const props = defineProps<{
  title?: string;
  landName?: string;
  landSurface?: number | null;
  landAltitude?: number | null;
  landCity?: string | null;
  expirationDate?: string | null;
  preferredGardenInteractionMode?: LandInteractionMode;
  sharingConditions?: LandSharingCondition[] | null;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
const { t: tLand } = useI18nExtended({
  messages: landMessages,
  rootKey: LAND_TRANSLATION_KEY,
  prefixed: true,
});
</script>
