<template>
  <Card
    hoverable
    class="grid md:grid-cols-[auto_1fr_auto_auto] gap-4 items-center"
  >
    <div class="bg-surface-container-high rounded-full size-12 flex items-center justify-center">
      <Icon
        :icon="faUserVneck"
        class="p-2"
      />
    </div>
    <div class="flex flex-col">
      <BaseHeading variant="h3">{{ title }}</BaseHeading>
      <div class="flex flex-row gap-2 opacity-70">
        <Badge
          v-if="city"
          size="sm"
          variant="outline"
        >
          <Icon :icon="faMapLocation" />
          {{ city }}
        </Badge>
        <Badge
          v-if="expirationDate"
          size="sm"
        >
          <Icon :icon="faClock" />
          {{ d(expirationDate, 'short') }}
        </Badge>
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
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import {
  LAND_INTERACTION_MODE,
  type LandInteractionMode,
  type LandSharingCondition,
} from '../../icons';

import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { faMapLocation } from '@fortawesome/pro-light-svg-icons/faMapLocation';
import { faClock } from '@fortawesome/pro-light-svg-icons/faClock';
import { faUserVneck } from '@fortawesome/pro-light-svg-icons/faUserVneck';
import TeraLandProposalSharingConditions from '../../common/sharing-conditions-icons/TeraLandProposalSharingConditions.vue';

const Card = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/card/Card.vue'));

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-app/base-heading/BaseHeading.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));
const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

const props = defineProps<{
  title?: string;
  city?: string | null;
  expirationDate?: string | null;
  preferredGardenInteractionMode?: LandInteractionMode;
  sharingConditions?: LandSharingCondition[] | null;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
