<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';
import { defineAsyncComponent } from 'vue';

usePreferredColorScheme();

useHead({
  titleTemplate: 'Tera | %s',
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

useSchemaOrg([
  defineOrganization({
    name: 'Tera',
    logo: '/logos/lychen/logo-lychen.svg',
  }),
  defineWebSite({
    name: 'Tera ',
  }),
  defineWebPage(),
]);
</script>

<template>
  <RouterView />
</template>
