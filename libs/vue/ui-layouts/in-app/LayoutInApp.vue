<template>
  <LayoutInAppResponsiveBase
    :application="application"
    :menu-structure="menuStructure"
  >
    <template #main><RouterView /></template>
    <template #avatar
      ><Avatar class="hover:outline-1 outline-offset-2 outline-secondary/30 cursor-pointer">
        <AvatarFallback>CN</AvatarFallback>
      </Avatar></template
    >
    <template #header></template>
  </LayoutInAppResponsiveBase>
</template>

<script lang="ts" setup>
import Avatar from '@lychen/vue-ui-components-core/avatar/Avatar.vue';
import AvatarFallback from '@lychen/vue-ui-components-core/avatar/AvatarFallback.vue';
import LayoutInAppResponsiveBase from './LayoutInAppResponsiveBase.vue';
import type { MenuStructure } from '.';

interface Props {
  application: {
    name: string;
  };
  menuStructure: MenuStructure;
}
defineProps<Props>();
</script>

<style lang="css" scoped>
.layout-in-app-mobile {
  --navigation-height: 100px;
}

.layout-in-app {
  --header-size: 64px;
  height: 100dvh;
  /*display: grid;*/
  grid-template-columns: 250px 1fr;
  grid-template-rows: var(--header-size) 1fr;
  grid-template-areas: 'corner header' 'navigation main';

  main {
    grid-area: main;
    overflow: auto;
    &::-webkit-scrollbar {
      display: none;
    }
  }

  nav {
    grid-area: navigation;
    overflow-y: auto;
    &::-webkit-scrollbar {
      display: none;
    }
  }
  header {
    grid-area: header;
  }
  nav {
    &::-webkit-scrollbar {
      display: block;
      width: 8px;
    }
    &::-webkit-scrollbar-track {
      background: transparent;
    }
    &::-webkit-scrollbar-thumb {
      border-radius: 20px;
    }
  }
  main {
    &::-webkit-scrollbar {
      display: block;
      width: 8px;
    }
    &::-webkit-scrollbar-track {
      background: transparent;
    }
    &::-webkit-scrollbar-thumb {
      border-radius: 20px;
    }
  }

  .corner {
    grid-area: corner;
  }
}
</style>
