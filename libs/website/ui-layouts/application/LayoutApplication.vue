<template>
  <div class="website-application-layout">
    <LayoutApplicationNavigation
      class="fixed p-2"
      :application-name
      :application-state
      :route-home
    >
      <slot name="navigation" />
      <template #mobile>
        <slot name="mobile" />
      </template>
      <template #header>
        <slot name="header" />
      </template>
    </LayoutApplicationNavigation>
    <slot>
      <main class="flex flex-col min-h-dvh">
        <RouterView />
      </main>
    </slot>
    <LayoutApplicationFooter
      class="footer"
      :application-name
    >
      <template #underLogo>
        <slot name="footerUnderLogo" />
      </template>
    </LayoutApplicationFooter>
  </div>
</template>

<script setup lang="ts">
import LayoutApplicationFooter from './LayoutApplicationFooter.vue';
import { LayoutApplicationNavigationProps } from '.';
import LayoutApplicationNavigation from './LayoutApplicationNavigation.vue';

defineProps<LayoutApplicationNavigationProps>();
</script>

<style lang="css" scoped>
.website-application-layout {
  display: flex;
  flex-direction: column;
}
</style>
