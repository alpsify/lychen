<script setup lang="ts">
import { APP_HOST } from '@/constants';
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';
import { defineOrganization, defineWebPage, defineWebSite, useSchemaOrg } from '@unhead/schema-org';
import { useHead } from '@unhead/vue';
import { defineAsyncComponent } from 'vue';

const LychenTooltipProvider = defineAsyncComponent(
  () => import('@lychen/ui-components/tooltip/LychenTooltipProvider.vue'),
);

usePreferredColorScheme();

useHead({
  titleTemplate: 'Lychen | %s',
  templateParams: {
    schemaOrg: {
      host: APP_HOST,
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
  <LychenTooltipProvider>
    <RouterView />
  </LychenTooltipProvider>
</template>
