<template>
  <Card
    hoverable
    class="h-full justify-between items-stretch active:bg-surface-container-highest"
  >
    <div class="flex flex-row gap-2 items-center justify-between">
      <BadgeTeraLandKind
        :kind="land.kind"
        class="self-start"
      />
      <Icon
        v-if="variant === VARIANT.Default"
        :icon="land.landMembers?.length === 1 ? faUser : faUsers"
      />
    </div>
    <div class="flex flex-col gap-1">
      <div
        v-if="variant === VARIANT.LookingForMember"
        class="flex flex-row gap-1 items-center"
      >
        <small
          v-if="land.surface"
          class="text-tertiary"
          >{{ t('property.surface.default', land.surface) }}</small
        >
        <small class="text-tertiary opacity-50">{{
          t('property.land_areas.default', land.landAreas?.length!)
        }}</small>
      </div>

      <BaseHeading variant="h3">{{ land.name }}</BaseHeading>
    </div>
  </Card>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { VARIANT, type Variant } from '.';
import { faUser } from '@fortawesome/pro-light-svg-icons/faUser';
import { faUsers } from '@fortawesome/pro-light-svg-icons/faUsers';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import type { LandJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import BadgeTeraLandKind from '../badge-tera-land-kind/BadgeTeraLandKind.vue';

const BaseHeading = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-app/base-heading/BaseHeading.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));

const { variant = VARIANT.Default } = defineProps<{
  land: LandJsonld;
  variant?: Variant;
}>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
