<template>
  <RouterView />
</template>

<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-color-scheme/composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';
import { TRANSLATION_KEY, messages } from '@lychen/vue-kolo/i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

usePreferredColorScheme();

useHead({
  titleTemplate: `${t('name')} | %s`,
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

defineOrganization({
  name: t('name'),
  logo: '/logos/lychen/logo-lychen.svg',
});
defineWebSite({
  name: t('name'),
});
defineWebPage();
</script>
