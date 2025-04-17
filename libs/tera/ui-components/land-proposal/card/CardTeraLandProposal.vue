<template>
  <Card
    hoverable
    class="h-full justify-between items-stretch active:bg-surface-container-highest"
  >
    <div class="flex flex-row gap-2 items-center justify-between">
      <div class="flex flex-col">
        <Badge
          v-if="expirationDate"
          size="sm"
          class="self-start"
        >
          {{ d(expirationDate, 'short') }}
        </Badge>
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
        <Tooltip
          v-for="(condition, index) in sharingConditions"
          :key="condition"
        >
          <TooltipTrigger>
            <Icon
              :icon="LAND_SHARING_CONDITION[condition]"
              class="p-2 rounded-full bg-surface-container-highest -ml-1 border-2 border-surface-container hover:-translate-y-2 transition-all duration-200 ease-in-out"
              :class="`z-${index}`"
            />
          </TooltipTrigger>
          <TooltipContent>
            {{ t(`property.sharing_conditions.options.${condition}`) }}
          </TooltipContent>
        </Tooltip>
      </div>

      <div>
        <Tooltip>
          <TooltipTrigger>
            <Icon
              v-if="preferredGardenInteractionMode"
              :icon="LAND_INTERACTION_MODE[preferredGardenInteractionMode]"
              class="p-2 rounded-full bg-surface-container-highest"
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
