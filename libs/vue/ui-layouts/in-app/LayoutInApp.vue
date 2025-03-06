<template>
  <LayoutInAppResponsiveBase
    :application="application"
    :menu-structure="menuStructure"
  >
    <template #main><RouterView /></template>
    <template #avatar>
      <Popover>
        <PopoverTrigger
          ><Avatar class="hover:outline-1 outline-offset-2 outline-secondary/30 cursor-pointer">
            <AvatarFallback>{{ avatarTag }}</AvatarFallback>
          </Avatar>
        </PopoverTrigger>
        <PopoverContent
          class="w-auto bg-surface-container-highest/80 rounded-xl mr-4 flex flex-col items-center gap-4 py-6 px-8"
          side="bottom"
          align="center"
          :side-offset="12"
        >
          <p class="font-italic text-xs opacity-50">{{ zitadelAuth.oidcAuth.userProfile.sub }}</p>
          <Avatar>
            <AvatarFallback>{{ avatarTag }}</AvatarFallback>
          </Avatar>
          <div class="flex flex-col items-center gap-0">
            <p class="text-lg font-bold">{{ zitadelAuth.oidcAuth.userProfile.name }}</p>
            <small>{{ zitadelAuth.oidcAuth.userProfile.email }}</small>
          </div>
          <Button variant="container-high"> Déconnexion </Button>
          <div class="flex flex-row gap-2 text-xs opacity-60">
            <a
              target="_blank"
              href=""
              >Conditions d'utilisation</a
            >
            |
            <a
              target="_blank"
              href=""
              >Règles de confidentialités</a
            >
          </div>
        </PopoverContent>
      </Popover>
    </template>
    <template #header></template>
  </LayoutInAppResponsiveBase>
</template>

<script lang="ts" setup>
import Avatar from '@lychen/vue-ui-components-core/avatar/Avatar.vue';
import AvatarFallback from '@lychen/vue-ui-components-core/avatar/AvatarFallback.vue';
import LayoutInAppResponsiveBase from './LayoutInAppResponsiveBase.vue';
import type { MenuStructure } from '.';
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-ui-components-core/popover';
import { computed } from 'vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';

interface Props {
  application: {
    name: string;
  };
  menuStructure: MenuStructure;
}
defineProps<Props>();

const avatarTag = computed(() => {
  const givenName = zitadelAuth.oidcAuth.userProfile.given_name;
  const familyName = zitadelAuth.oidcAuth.userProfile.family_name;
  if (givenName && familyName) {
    return `${givenName.charAt(0)}${familyName.charAt(0)}`;
  }
  if (givenName) {
    return givenName.charAt(0);
  }
  if (familyName) {
    return familyName.charAt(0);
  }
  return 'JD';
});
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
