<template>
  <LayoutApplication
    application-name="Tera"
    :application-state="APP_STATE"
    :route-home="RoutePageHome"
  >
    <template #navigation>
      <TheNavigation />
    </template>
    <template #header><LychenLogoFull class="h-10" /></template>
    <template #mobile>
      <TheNavigationMobile />
    </template>
    <template #footerUnderLogo>
      <TheFooter />
    </template>
  </LayoutApplication>
</template>

<script lang="ts" setup>
import { RoutePageHome } from '@/pages/home';
import { APP_STATE } from '@lychen/tera-util-constants/App';
import { defineAsyncComponent } from 'vue';

const LayoutApplication = defineAsyncComponent(
  () => import('@lychen/website-ui-layouts/application/LayoutApplication.vue'),
);
const LychenLogoFull = defineAsyncComponent(
  () => import('@lychen/ui-components/logo/LychenLogoFull.vue'),
);

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));
</script>
