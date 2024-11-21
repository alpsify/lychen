<template>
  <div class="lychen-website-layout">
    <LayoutWebsiteNavigation class="lychen-website-layout-navigation fixed p-2">
      <slot name="navigation"></slot>
      <template #mobile>
        <slot name="mobile"></slot>
      </template>
      <template #header>
        <slot name="header"></slot>
      </template>
    </LayoutWebsiteNavigation>
    <slot>
      <main class="flex flex-col">
        <RouterView />
      </main>
    </slot>
    <LayoutWebsiteFooter class="footer">
      <slot name="footer"></slot>
    </LayoutWebsiteFooter>
  </div>
</template>

<script setup lang="ts">
import LayoutWebsiteFooter from './LayoutWebsiteFooter.vue';
import LayoutWebsiteNavigation from './LayoutWebsiteNavigation.vue';
</script>

<style lang="css" scoped>
.lychen-website-layout {
  display: flex;
  flex-direction: column;
}
</style>
