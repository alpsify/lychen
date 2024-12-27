<template>
  <LayoutMain>
    <template #navigation>
      <TheNavigation />
    </template>
    <template #header><LychenLogo class="h-10" /></template>
    <template #mobile>
      <TheNavigationMobile />
    </template>
    <template #footer>
      <TheFooter />
    </template>
  </LayoutMain>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

const LayoutMain = defineAsyncComponent(
  () => import('@lychen/website-ui-layouts/main/LayoutMain.vue'),
);
const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));
</script>
