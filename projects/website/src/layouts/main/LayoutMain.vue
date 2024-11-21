<template>
  <LayoutWebsite>
    <template #navigation>
      <LayoutMainNavigation />
    </template>
    <template #header><LychenLogo class="h-10" /></template>
    <template #mobile>
      <LayoutMainNavigationMobile />
    </template>
    <template #footer>
      <LayoutMainFooter />
    </template>
  </LayoutWebsite>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

const LayoutWebsite = defineAsyncComponent(
  () => import('@lychen/ui-layouts/website/LayoutWebsite.vue'),
);
const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const LayoutMainNavigation = defineAsyncComponent(() => import('./LayoutMainNavigation.vue'));
const LayoutMainNavigationMobile = defineAsyncComponent(
  () => import('./LayoutMainNavigationMobile.vue'),
);
const LayoutMainFooter = defineAsyncComponent(() => import('./LayoutMainFooter.vue'));
</script>
