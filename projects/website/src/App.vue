<script setup lang="ts">
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';
import { defineAsyncComponent } from 'vue';

const TooltipProvider = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/tooltip/TooltipProvider.vue'),
);

usePreferredColorScheme();

useHead({
  titleTemplate: 'Lychen | %s',
  templateParams: {
    schemaOrg: {
      host: import.meta.env.VITE_UNHEAD_HOST,
    },
  },
});

useSchemaOrg([
  defineOrganization({
    name: 'Lychen',
    logo: '/logos/lychen/logo-lychen.svg',
  }),
  defineWebSite({
    name: 'Lychen',
  }),
  defineWebPage(),
]);
</script>

<template>
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>
