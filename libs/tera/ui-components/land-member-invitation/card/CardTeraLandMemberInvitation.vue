<template>
  <Card
    class="p-4 gap-2"
    hoverable
  >
    <p class="font-medium">{{ landMemberInvitation.email }}</p>
    <p class="font-medium">{{ landMemberInvitation.state }}</p>
    <div>
      <BadgeTeraLandRole
        v-for="(item, index) in landMemberInvitation.landRoles"
        :key="index"
        :land-role="item"
        class="bg-surface-container-high text-on-surface-container mr-2 font-normal"
      />
    </div>
  </Card>
</template>

<script setup lang="ts">
import type { LandMemberInvitationJsonldUserLandMemberInvitationCollection } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-member-invitation';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import BadgeTeraLandRole from '../../land-role/badge/BadgeTeraLandRole.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{
  landMemberInvitation: LandMemberInvitationJsonldUserLandMemberInvitationCollection;
}>();
</script>
