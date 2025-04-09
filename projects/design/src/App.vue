<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';

usePreferredColorScheme();

useHead({
  titleTemplate: `Design | %s`,
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

useSchemaOrg([
  defineOrganization({
    name: 'Design',
    logo: '/logos/lychen/logo-lychen.svg',
  }),
  defineWebSite({
    name: "Design'",
  }),
  defineWebPage(),
]);
</script>

<template>
  <RouterView />
</template>
