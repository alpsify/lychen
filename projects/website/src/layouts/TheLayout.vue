<template>
  <LayoutMain>
    <template #navigation>
      <TheNavigation />
    </template>
    <template #header><LogoLychenFull class="h-10" /></template>
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
  () => import('@lychen/vue-layouts/website-main/LayoutWebsiteMain.vue'),
);
const LogoLychenFull = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/logo-lychen/LogoLychenFull.vue'),
);

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));
</script>
