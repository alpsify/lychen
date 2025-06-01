<template>
  <ToggleGroup
    v-model="model"
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
            model.includes(sharingConditionOption)
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
</template>

<script setup lang="ts">
import { ToggleGroup, ToggleGroupItem } from '@lychen/vue-ui-components-core/toggle-group';
import { Icon } from '@lychen/vue-ui-components-core/icon';
import {
  LAND_SHARING_CONDITIONS,
  type LandSharingCondition,
} from '@lychen/tera-api-sdk/constants/LandSharingCondition';
import { LAND_SHARING_CONDITION_ICON } from '@lychen/tera-ui-components/icons/IconLandSharingCondition';
import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-proposal';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

const model = defineModel<LandSharingCondition[]>({ default: [] });

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
