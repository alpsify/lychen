<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';
import { TRANSLATION_KEY, messages } from '@lychen/kiro-i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

usePreferredColorScheme();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useHead({
  titleTemplate: `${t('name')} | %s`,
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

useSchemaOrg([
  defineOrganization({
    name: t('name'),
    logo: '/logos/lychen/logo-lychen.svg',
  }),
  defineWebSite({
    name: t('name'),
  }),
  defineWebPage(),
]);
</script>

<template>
  <RouterView />
</template>
