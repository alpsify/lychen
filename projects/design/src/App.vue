<script setup lang="ts">
import { TooltipProvider } from '@lychen/vue-ui-components-core/tooltip';
import { usePreferredColorScheme } from '@lychen/vue-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';

usePreferredColorScheme();

useHead({
  titleTemplate: `Lychen - Design System | %s`,
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

useSchemaOrg([
  defineOrganization({
    name: 'Lychen - Design System',
    logo: '/logos/lychen/logo-lychen.svg',
  }),
  defineWebSite({
    name: 'Lychen - Design System',
  }),
  defineWebPage(),
]);
</script>

<template>
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>
