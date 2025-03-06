<template>
  <div class="lg:hidden flex flex-col layout-in-app-mobile bg-surface">
    <nav
      class="p-2 m-4 bg-surface-container-low rounded-xl flex flex-row justify-between items-center gap-4"
    >
      <slot name="navigation">
        <Sheet>
          <SheetTrigger as-child>
            <Button
              variant="container-high"
              :icon="faBarsStaggered"
            />
          </SheetTrigger>
          <SheetContent
            side="left"
            class="bg-surface-container/70 text-on-surface-container w-2/3 backdrop-blur-lg flex flex-col"
          >
            <template #header><ApplicationTitle :value="application.name" /></template>
            <SheetClose as-child>
              <div class="flex flex-col gap-4 justify-between grow">
                <LayoutInAppNavigationMenus :menu-structure="menuStructure" />
                <div class="flex flex-row justify-center items-center">
                  <LogoLychenFull />
                </div>
              </div>
            </SheetClose>
          </SheetContent>
        </Sheet>
        <div class="flex flex-row gap-4">
          <Button
            :icon="faBell"
            variant="container-high"
          />
          <slot name="avatar" />
        </div>
      </slot>
    </nav>
    <main class="p-4">
      <slot name="main" />
    </main>
  </div>
  <div class="hidden layout-in-app bg-surface-container-low lg:grid">
    <div class="corner h-[var(--header-size)] flex flex-row items-center p-6">
      <slot name="corner">
        <ApplicationTitle :value="application.name" />
      </slot>
    </div>
    <nav class="flex flex-col justify-between py-4 px-6">
      <slot name="navigation"
        ><LayoutInAppNavigationMenus :menu-structure="menuStructure" />
        <div class="flex flex-row justify-center items-center">
          <LogoLychenFull />
        </div>
      </slot>
    </nav>
    <header class="py-2 p-4 flex flex-row justify-between items-center gap-4">
      <slot name="header">
        <div class="flex flex-row gap-2 justify-end items-center"></div>
        <div class="flex flex-row gap-2 justify-end items-center">
          <Popover>
            <PopoverTrigger>
              <Button
                :icon="faCircleQuestion"
                variant="container-high"
              />
            </PopoverTrigger>
            <PopoverContent
              class="w-auto bg-surface-container-highest/80 rounded-xl mr-4"
              side="bottom"
              align="center"
              :side-offset="12"
            >
              Aides
            </PopoverContent>
          </Popover>
          <Popover>
            <PopoverTrigger>
              <Button
                :icon="faBell"
                variant="container-high"
              />
            </PopoverTrigger>
            <PopoverContent
              class="w-auto bg-surface-container-highest/80 rounded-xl mr-4"
              side="bottom"
              align="center"
              :side-offset="12"
            >
              Notifications
            </PopoverContent>
          </Popover>
          <Button
            :icon="faGear"
            variant="container-high"
          />
          <Popover>
            <PopoverTrigger>
              <Button
                :icon="faGridRound"
                variant="container-high"
              />
            </PopoverTrigger>
            <PopoverContent
              class="w-auto bg-surface-container-highest/80 rounded-xl mr-4"
              side="bottom"
              align="center"
              :side-offset="12"
            >
              <div
                class="bg-surface-container rounded-full p-4 justify-between flex flex-row items-center gap-4 cursor-pointer"
              >
                Décrouvrir lychen
                <Icon :icon="faArrowRight" />
              </div>
            </PopoverContent>
          </Popover>
          <slot name="avatar" />
        </div>
      </slot>
    </header>
    <main class="rounded-2xl bg-surface mb-4 mr-4 shadow-md p-6">
      <slot name="main" />
    </main>
  </div>
</template>

<script lang="ts" setup>
import ApplicationTitle from '@lychen/applications-ui-components/ApplicationTitle.vue';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { faBarsStaggered } from '@fortawesome/pro-light-svg-icons/faBarsStaggered';
import { faGridRound } from '@fortawesome/pro-light-svg-icons/faGridRound';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';
import { faCircleQuestion } from '@fortawesome/pro-light-svg-icons/faCircleQuestion';
import { faBell } from '@fortawesome/pro-light-svg-icons/faBell';
import { faArrowRight } from '@fortawesome/pro-light-svg-icons/faArrowRight';
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-ui-components-core/popover';
import LogoLychenFull from '@lychen/vue-ui-components-extra/logo-lychen/LogoLychenFull.vue';
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetTrigger,
} from '@lychen/vue-ui-components-core/sheet';
import type { MenuStructure } from '.';
import LayoutInAppNavigationMenus from './LayoutInAppNavigationMenus.vue';

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
