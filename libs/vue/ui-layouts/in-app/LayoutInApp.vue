<template>
  <div class="layout-in-app bg-surface-container-low">
    <div class="corner h-[var(--header-size)] flex flex-row items-center p-6">
      <ApplicationTitle :value="application.name" />
    </div>
    <nav class="flex flex-col justify-between py-4 px-6">
      <div class="flex flex-col gap-6">
        <div
          v-for="(menuSection, sectionName) in menus"
          :key="sectionName"
          class="flex flex-col gap-0"
        >
          <h3
            v-if="menuSection.title"
            class="text-on-surface-container-low/50 uppercase font-medium text-sm"
          >
            {{ menuSection.title }}
          </h3>
          <RouterLink
            v-for="(menu, index) in menuSection.list"
            :key="index"
            :to="menu.to"
            class="flex flex-row items-center gap-2 px-4 py-2 rounded-md hover:bg-surface-container-highest"
          >
            <Icon :icon="menu.icon" />
            <span>{{ menu.title }}</span>
          </RouterLink>
        </div>
      </div>
      <div class="flex flex-row justify-center items-center">
        <LogoLychenFull />
      </div>
    </nav>
    <header class="py-2 p-4 flex flex-row justify-between items-center gap-4">
      <div class="flex flex-row gap-2 justify-end items-center"></div>
      <div class="flex flex-row gap-2 justify-end items-center">
        <Button
          :icon="faCircleQuestion"
          variant="container-high"
        />
        <Button
          :icon="faBell"
          variant="container-high"
        />
        <Button
          :icon="faGear"
          variant="container-high"
        />
        <Button
          :icon="faGridRound"
          variant="container-high"
        />
        <Avatar class="hover:outline-1 outline-offset-2 outline-secondary/30 cursor-pointer">
          <AvatarFallback>CN</AvatarFallback>
        </Avatar>
      </div>
    </header>
    <main class="rounded-2xl bg-surface mb-4 mr-4 shadow-md">
      <RouterView />
    </main>
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';
import { faGridRound } from '@fortawesome/pro-light-svg-icons/faGridRound';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';
import { faCircleQuestion } from '@fortawesome/pro-light-svg-icons/faCircleQuestion';
import ApplicationTitle from '@lychen/applications-ui-components/ApplicationTitle.vue';
import Avatar from '@lychen/vue-ui-components-core/avatar/Avatar.vue';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import AvatarFallback from '@lychen/vue-ui-components-core/avatar/AvatarFallback.vue';
import type { IconDefinition } from '@fortawesome/free-brands-svg-icons';
import type { RouteLocationAsPathGeneric, RouteLocationAsRelativeGeneric } from 'vue-router';
import { faBell } from '@fortawesome/pro-light-svg-icons/faBell';

interface Props {
  application: {
    name: string;
  };
  menus: {
    [key: string]: {
      title?: string;
      list: {
        to: string | RouteLocationAsRelativeGeneric | RouteLocationAsPathGeneric;
        icon: IconDefinition;
        title: string;
      }[];
    };
  };
}
defineProps<Props>();

const LogoLychenFull = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/logo-lychen/LogoLychenFull.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
);
</script>

<style lang="css" scoped>
.layout-in-app {
  --header-size: 64px;

  height: 100dvh;
  display: grid;
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
