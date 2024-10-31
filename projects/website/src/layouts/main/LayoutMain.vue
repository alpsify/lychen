<template>
  <LayoutWebsite>
    <template #navigation>
      <LayoutMainNavigation />
    </template>
    <template #footer>
      <LayoutMainFooter />
    </template>
  </LayoutWebsite>
</template>

<script lang="ts" setup>
import LayoutWebsite from '@lychen/ui-layouts/website/LayoutWebsite.vue';
import { defineAsyncComponent } from 'vue';

const LayoutMainNavigation = defineAsyncComponent(() => import('./LayoutMainNavigation.vue'));
const LayoutMainFooter = defineAsyncComponent(() => import('./LayoutMainFooter.vue'));
</script>
