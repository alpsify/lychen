<template>
  <Card
    hoverable
    class="flex flex-col gap-2"
  >
    <div class="flex flex-row justify-between gap-4 items-center">
      <span>{{ landMember.person?.givenName }} {{ landMember.person?.familyName }}</span>
      <span
        v-if="landMember.joinedAt"
        class="text-sm"
        >{{ d(landMember.joinedAt, 'short') }}</span
      >
    </div>
    <div class="flex flex-row gap-2">
      <Badge v-if="landMember.owner">{{ t('property.owner.label') }}</Badge>
      <BadgeTeraLandRole
        v-for="(item, index) in landMember.landRoles"
        :key="index"
        :land-role="item"
      />
    </div>
  </Card>
</template>

<script setup lang="ts">
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { Badge } from '@lychen/vue-ui-components-core/badge';
import BadgeTeraLandRole from '../../land-role/badge/BadgeTeraLandRole.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{ landMember: components['schemas']['LandMember.jsonld'] }>();
</script>
