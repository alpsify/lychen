<template>
  <div class="layout-in-app">
    <LayoutInAppNavigation class="navigation" />
    <main class="flex flex-col">
      <RouterView />
    </main>
  </div>
</template>

<script lang="ts" setup>
import LayoutInAppNavigation from './navigation/LayoutInAppNavigation.vue';
</script>

<style lang="css" scoped>
.layout-in-app {
  height: 100dvh;
  display: grid;
  grid-template-columns: 1;
  grid-template-rows: 1fr 70px;
  grid-template-areas: 'main' 'navigation';

  main {
    grid-area: main;
    overflow: auto;
    &::-webkit-scrollbar {
      display: none;
    }
  }

  .navigation {
    grid-area: navigation;
  }
}
</style>
