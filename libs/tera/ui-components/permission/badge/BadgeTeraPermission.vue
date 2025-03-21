<template>
  <Badge class="cursor-default">
    {{ t(permission) }}
  </Badge>
</template>

<script setup lang="ts">
import { Badge } from '@lychen/vue-ui-components-core/badge';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/permission';
import { LandRoleJsonldPermissionsEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{
  permission: LandRoleJsonldPermissionsEnum;
}>();
</script>
