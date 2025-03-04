<template>
  <LayoutWebsiteApplication
    :application-name="t('name')"
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
  </LayoutWebsiteApplication>
</template>

<script lang="ts" setup>
import { RoutePageHome } from '@/pages/home';
import { APP_STATE } from '@lychen/eko-util-constants/App';
import { defineAsyncComponent } from 'vue';
import { TRANSLATION_KEY, messages } from '@lychen/eko-ui-i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LayoutWebsiteApplication = defineAsyncComponent(
  () => import('@lychen/vue-ui-layouts/website-app/LayoutWebsiteApplication.vue'),
);
const LychenLogoFull = defineAsyncComponent(
  () => import('@lychen/ui-components/logo/LychenLogoFull.vue'),
);

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
