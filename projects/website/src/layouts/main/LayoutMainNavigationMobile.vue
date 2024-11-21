<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-2">
    <div class="text-lg font-bold">
      <RouterLink
        :to="{ name: RoutePageHome.name }"
        @click="closeMobileMenu"
        >{{ t(`${TRANSLATION_KEY}.navigation.home.title`) }}
      </RouterLink>
    </div>
    <LychenAccordion
      type="single"
      class="w-full"
      collapsible
      :default-value="'resources'"
    >
      <LychenAccordionItem value="applications">
        <LychenAccordionTrigger class="text-lg font-bold">{{
          t(`${TRANSLATION_KEY}.navigation.app.title`)
        }}</LychenAccordionTrigger>
        <LychenAccordionContent>
          <LychenNavigationMenuSubLink
            v-for="application in applicationsList"
            v-bind="application"
            :key="application.title"
            @navigate-to-route="closeMobileMenu"
          />
        </LychenAccordionContent>
      </LychenAccordionItem>
      <LychenAccordionItem value="resources">
        <LychenAccordionTrigger class="text-lg font-bold">{{
          t(`${TRANSLATION_KEY}.navigation.resources.title`)
        }}</LychenAccordionTrigger>
        <LychenAccordionContent>
          <LychenNavigationMenuSubLink
            v-for="resourceMenu in resourcesMenuList"
            v-bind="resourceMenu"
            :key="resourceMenu.title"
            @navigate-to-route="closeMobileMenu"
          />
        </LychenAccordionContent>
      </LychenAccordionItem>
      <LychenAccordionItem value="community">
        <LychenAccordionTrigger class="text-lg font-bold">{{
          t(`${TRANSLATION_KEY}.navigation.community.title`)
        }}</LychenAccordionTrigger>
        <LychenAccordionContent>
          <LychenNavigationMenuSubLink
            v-for="communityMenu in communityMenuList"
            v-bind="communityMenu"
            :key="communityMenu.title"
            @navigate-to-route="closeMobileMenu"
          />
        </LychenAccordionContent>
      </LychenAccordionItem>
    </LychenAccordion>

    <div class="text-lg font-bold">
      <RouterLink
        :to="{ name: RoutePagePrice.name }"
        @click="closeMobileMenu"
        >{{ t(`${TRANSLATION_KEY}.navigation.price.title`) }}
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useApplications } from '@/composables/application/useApplications';

import { TRANSLATION_KEY, useTranslations } from './i18n';
import { RoutePagePrice } from '@/pages/price';
import { RoutePageHome } from '@/pages/home';
import { useCommunityMenu, useResourcesMenu } from '.';
import LychenNavigationMenuSubLink from '@lychen/ui-components/navigation-menu/LychenNavigationMenuSubLink.vue';
import LychenAccordion from '@lychen/ui-components/accordion/LychenAccordion.vue';
import LychenAccordionTrigger from '@lychen/ui-components/accordion/LychenAccordionTrigger.vue';
import LychenAccordionContent from '@lychen/ui-components/accordion/LychenAccordionContent.vue';
import LychenAccordionItem from '@lychen/ui-components/accordion/LychenAccordionItem.vue';
import { inject, type Ref } from 'vue';

const { t } = useTranslations();

const { applicationsList } = useApplications();
const { communityMenuList } = useCommunityMenu();
const { resourcesMenuList } = useResourcesMenu();

const mobileMenuIsOpen = inject<Ref<boolean>>('mobileMenuIsOpen');

function closeMobileMenu() {
  mobileMenuIsOpen!.value = false;
}
</script>

<style lang="css" scoped></style>
