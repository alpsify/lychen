<template>
  <Badge>
    {{ t(permission) }}
  </Badge>
</template>

<script setup lang="ts">
import { Badge } from '@lychen/vue-components-core/badge';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/i18n-tera/permission';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

defineProps<{
  permission: string;
}>();
</script>
