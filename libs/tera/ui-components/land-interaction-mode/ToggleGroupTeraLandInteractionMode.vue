<template>
  <ToggleGroup
    v-model="model"
    type="multiple"
  >
    <Tooltip
      v-for="interactionModeOption in LAND_INTERACTION_MODES"
      :key="interactionModeOption"
    >
      <TooltipTrigger>
        <ToggleGroupItem
          size="sm"
          :value="interactionModeOption"
          :aria-label="interactionModeOption"
        >
          <Icon :icon="LAND_INTERACTION_MODE_ICON[interactionModeOption]" />
        </ToggleGroupItem>
      </TooltipTrigger>
      <TooltipContent>
        {{ t(`property.preferred_interaction_mode.options.${interactionModeOption}`) }}
      </TooltipContent>
    </Tooltip>
  </ToggleGroup>
</template>

<script setup lang="ts">
import { ToggleGroup, ToggleGroupItem } from '@lychen/vue-ui-components-core/toggle-group';
import { Icon } from '@lychen/vue-ui-components-core/icon';

import {
  LAND_INTERACTION_MODES,
  type LandInteractionMode,
} from '@lychen/tera-util-api-sdk/constants/LandInteractionMode';
import { LAND_INTERACTION_MODE_ICON } from '@lychen/tera-ui-components/icons/IconLandInteractionMode';

import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-proposal';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const model = defineModel<LandInteractionMode[]>({ default: [] });

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
