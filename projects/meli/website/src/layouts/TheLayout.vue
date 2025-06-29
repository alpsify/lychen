<template>
  <LayoutWebsiteApplication
    :application-name="t('name')"
    :application-state="APP_STATE"
    :route-home="RoutePageHome"
  >
    <template #navigation>
      <TheNavigation />
    </template>
    <template #header><LogoLychenFull class="h-10" /></template>
    <template #mobile>
      <TheNavigationMobile />
    </template>
    <template #footerUnderLogo>
      <TheFooter />
    </template>
  </LayoutWebsiteApplication>
</template>

<script lang="ts" setup>
import { RoutePageHome } from '@/pages/home';
import { APP_STATE } from '@lychen/meli-constants/App';
import { defineAsyncComponent } from 'vue';
import { TRANSLATION_KEY, messages } from '@lychen/meli-i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const LayoutWebsiteApplication = defineAsyncComponent(
  () => import('@lychen/vue-layouts/website-app/LayoutWebsiteApplication.vue'),
);
const LogoLychenFull = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/logo-lychen/LogoLychenFull.vue'),
);

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
