<template>
  <LayoutApplication
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
  </LayoutApplication>
</template>

<script lang="ts" setup>
import { RoutePageHome } from '@/pages/home';
import { APP_STATE } from '@lychen/myko-util-constants/App';
import { defineAsyncComponent } from 'vue';
import { TRANSLATION_KEY, messages } from '@lychen/myko-ui-i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LayoutApplication = defineAsyncComponent(
  () => import('@lychen/website-ui-layouts/application/LayoutApplication.vue'),
);
const LychenLogoFull = defineAsyncComponent(
  () => import('@lychen/ui-components/logo/LychenLogoFull.vue'),
);

const TheNavigation = defineAsyncComponent(() => import('./TheNavigation.vue'));
const TheNavigationMobile = defineAsyncComponent(() => import('./TheNavigationMobile.vue'));
const TheFooter = defineAsyncComponent(() => import('./TheFooter.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
