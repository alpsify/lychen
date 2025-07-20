<template>
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>

<script setup lang="ts">
import { TooltipProvider } from '@lychen/vue-components-core/tooltip';
import { usePreferredColorScheme } from '@lychen/vue-color-scheme/composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite } from '@unhead/schema-org';
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

defineOrganization({
  name: 'Lychen - Design System',
  logo: '/logos/lychen/logo-lychen.svg',
});
defineWebSite({
  name: 'Lychen - Design System',
});
defineWebPage();
</script>
