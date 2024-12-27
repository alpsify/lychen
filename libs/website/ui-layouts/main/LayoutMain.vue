<template>
  <div class="website-main-layout">
    <LayoutMainNavigation class="fixed p-2">
      <slot name="navigation"></slot>
      <template #mobile>
        <slot name="mobile"></slot>
      </template>
      <template #header>
        <slot name="header"></slot>
      </template>
    </LayoutMainNavigation>
    <slot>
      <main class="flex flex-col min-h-dvh">
        <RouterView />
      </main>
    </slot>
    <LayoutMainFooter class="footer">
      <slot name="footer"></slot>
    </LayoutMainFooter>
  </div>
</template>

<script setup lang="ts">
import LayoutMainFooter from './LayoutMainFooter.vue';
import LayoutMainNavigation from './LayoutMainNavigation.vue';
</script>

<style lang="css" scoped>
.website-main-layout {
  display: flex;
  flex-direction: column;
}
</style>
