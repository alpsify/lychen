<template>
  <LayoutWebsite>
    <template #navigation>
      <LayoutMainNavigation />
    </template>
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

const LayoutMainNavigation = defineAsyncComponent(() => import('./LayoutMainNavigation.vue'));
const LayoutMainNavigationMobile = defineAsyncComponent(
  () => import('./LayoutMainNavigationMobile.vue'),
);
const LayoutMainFooter = defineAsyncComponent(() => import('./LayoutMainFooter.vue'));
</script>
