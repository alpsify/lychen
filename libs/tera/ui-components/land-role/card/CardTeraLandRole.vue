<template>
  <Card
    class="px-4 py-2"
    hoverable
  >
    <p class="font-medium">{{ landRole.name }}</p>
    <p
      v-if="landRole.landMembers"
      class="opacity-70 text-sm"
    >
      {{ t('property.land_members.default', landRole.landMembers.length) }}
    </p>
  </Card>
</template>

<script setup lang="ts">
import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-role';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{ landRole: LandRoleJsonld }>();
</script>
