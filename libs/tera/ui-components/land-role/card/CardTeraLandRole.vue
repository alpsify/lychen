<template>
  <Card
    class="p-4 gap-2"
    hoverable
  >
    <p class="font-medium">{{ landRole.name }}</p>
    <p
      v-if="landRole.landMembers"
      class="opacity-70 text-sm"
    >
      {{ t('property.land_members.default', landRole.landMembers?.length || 0) }}
    </p>
    <div>
      <BadgeTeraPermission
        v-for="permission in landRole.permissions"
        :key="permission"
        :permission="permission"
        class="bg-surface-container-high text-on-surface-container mr-2 font-normal"
      />
    </div>
  </Card>
</template>

<script setup lang="ts">
import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-role';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import BadgeTeraPermission from '../../permission/badge/BadgeTeraPermission.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{ landRole: LandRoleJsonld }>();
</script>
