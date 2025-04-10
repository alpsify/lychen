<template>
  <LayoutInAppResponsiveBase
    :application="application"
    :menu-structure="menuStructure"
  >
    <template
      v-for="(menuSection, sectionName) in menuStructure"
      :key="sectionName"
      #[`${sectionName}-menu-section`]
    >
      <slot :name="`${sectionName}-menu-section`" />
    </template>
    <template #main><RouterView /></template>
    <template #avatar>
      <Popover>
        <PopoverTrigger
          ><Avatar
            class="hover:outline-1 outline-offset-2 outline-on-surface-container-highest/40 cursor-pointer"
          >
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
          <Button variant="outline"> Déconnexion </Button>
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
