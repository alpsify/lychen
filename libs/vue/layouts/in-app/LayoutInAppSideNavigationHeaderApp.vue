<template>
  <LayoutInAppSideNavigationHeader>
    <AppBadgeRoot :class="!navigationExpanded ? 'flex-col gap-1' : ''">
      <!--<AppBadgeLogo :src />-->
      <AppBadgeText
        :name-class="!navigationExpanded ? 'text-xs' : ''"
        :name
        :name-only="!navigationExpanded"
      />
    </AppBadgeRoot>
  </LayoutInAppSideNavigationHeader>
</template>

<script lang="ts" setup>
import AppBadgeRoot from '@lychen/vue-components-app/app-badge/AppBadgeRoot.vue';
import AppBadgeText from '@lychen/vue-components-app/app-badge/AppBadgeText.vue';
import LayoutInAppSideNavigationHeader from './LayoutInAppSideNavigationHeader.vue';
import { inject } from 'vue';
import { INJECTION_KEY_NAVIGATION_EXPANDED } from '.';

const navigationExpanded = inject(INJECTION_KEY_NAVIGATION_EXPANDED);

defineProps<{ name: string }>();
</script>
