<template>
  <Teleport
    to="#main-title-right"
    defer
  >
    <div class="flex flex-row gap-2 justify-end items-center">
      <RouterLink :to="RoutePageLands">
        <Button
          variant="ghost"
          size="xs"
          :icon="faListUl"
        ></Button>
      </RouterLink>
      <DialogTeraLandCreate v-model:open="open">
        <Button
          variant="ghost"
          size="xs"
          :icon="faPlus"
        ></Button>
      </DialogTeraLandCreate>
    </div>
  </Teleport>
  <LayoutInApp
    :menu-structure="navigation"
    :application="{ name: 'Tera' }"
  >
    <template #main-menu-section>
      <Accordion
        v-if="lands?.member"
        class="w-full"
        collapsible
        type="single"
        :default-value="lands.member[0]?.ulid"
      >
        <AccordionItem
          v-for="land in lands.member"
          :key="land.ulid"
          :value="land.ulid!"
        >
          <RouterLink
            :to="{ name: RoutePageLandDashboard.name, params: { landUlid: land.ulid } }"
            class="accordion-menu-item"
          >
            <AccordionTrigger
              class="text-sm font-medium flex flex-row gap-2 items-center p-2 cursor-pointer hover:bg-surface-container rounded-xl group"
            >
              {{ land.name }}
            </AccordionTrigger>
          </RouterLink>

          <AccordionContent class="flex flex-col gap-1 p-2">
            <LayoutInAppNavigationMenuItem
              v-for="(menu, index) in mainMenus"
              :key="index"
              :to="{ name: menu.to.name, params: { landUlid: land.ulid } }"
              :icon="menu.icon"
              :title="menu.title"
            />
          </AccordionContent>
        </AccordionItem> </Accordion
    ></template>
  </LayoutInApp>
</template>

<script setup lang="ts">
import LayoutInApp from '@lychen/vue-ui-layouts/in-app/LayoutInApp.vue';
import { faHouse } from '@fortawesome/pro-light-svg-icons/faHouse';
import { faClipboardListCheck } from '@fortawesome/pro-light-svg-icons/faClipboardListCheck';
import { faCalendarDays } from '@fortawesome/pro-light-svg-icons/faCalendarDays';
import { faSeedling } from '@fortawesome/pro-light-svg-icons/faSeedling';
import { faBagSeedling } from '@fortawesome/pro-light-svg-icons/faBagSeedling';
import { faSunPlantWilt } from '@fortawesome/pro-light-svg-icons/faSunPlantWilt';
import { faNotebook } from '@fortawesome/pro-light-svg-icons/faNotebook';
import { faBuildingMemo } from '@fortawesome/pro-light-svg-icons/faBuildingMemo';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faPeopleSimple } from '@fortawesome/pro-light-svg-icons/faPeopleSimple';
import { faBuildingWheat } from '@fortawesome/pro-light-svg-icons/faBuildingWheat';
import { faChartSimple } from '@fortawesome/pro-light-svg-icons/faChartSimple';

import { RoutePageDashboard } from '@pages/dashboard';
import { RoutePageFoodSafety } from '../../pages/food-safety';
import { RoutePageGreeningPermit } from '@/pages/greening-permit';
import { RoutePageLandCalendars } from '@/pages/land/calendars';
import { RoutePageLandCultureItinaries } from '@/pages/land/culture-itinaries';
import { RoutePageLandDiary } from '@/pages/land/diary';
import { RoutePageCoGardening } from '@/pages/co-gardening';

import { RoutePageData } from '@/pages/data';
import { RoutePageGrainLibrary } from '@/pages/grain-library';
import { RoutePageHerbarium } from '@/pages/herbarium';
import { RoutePageSharedGardens } from '@/pages/shared-gardens';
import { RoutePageLands } from '@/pages/lands';
import { faListUl, faPlus } from '@fortawesome/pro-light-svg-icons';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import Accordion from '@lychen/vue-ui-components-core/accordion/Accordion.vue';
import AccordionContent from '@lychen/vue-ui-components-core/accordion/AccordionContent.vue';
import AccordionTrigger from '@lychen/vue-ui-components-core/accordion/AccordionTrigger.vue';
import AccordionItem from '@lychen/vue-ui-components-core/accordion/AccordionItem.vue';
import { RoutePageLandTasks } from '../../pages/land/tasks';
import { RoutePageLandDashboard } from '@/pages/land/dashboard';
import LayoutInAppNavigationMenuItem from '@lychen/vue-ui-layouts/in-app/LayoutInAppNavigationMenuItem.vue';
import { useEventBus } from '@vueuse/core';
import {
  landDeleteSucceededEvent,
  landPostSucceededEvent,
  landPatchSucceededEvent,
} from '@lychen/tera-util-events/LandEvents';
import { landMemberInvitationAcceptSucceededEvent } from '@lychen/tera-util-events/LandMemberInvitationEvents';
import DialogTeraLandCreate from '@lychen/tera-ui-components/land/dialogs/create/DialogTeraLandCreate.vue';
import { ref } from 'vue';
import { landMemberLeaveSucceededEvent } from '@lychen/tera-util-events/LandMemberEvents';

const open = ref(false);

const navigation = {
  first: {
    list: [
      {
        icon: faHouse,
        to: RoutePageDashboard,
        title: 'Tableau de bord',
      },
    ],
  },
  main: {
    title: 'Espaces de culture',
  },
  resources: {
    title: 'Ressources',
    list: [
      {
        icon: faSeedling,
        to: RoutePageHerbarium,
        title: 'Herbarium',
      },
      {
        icon: faBagSeedling,
        to: RoutePageGrainLibrary,
        title: 'Grainothèque',
      },
    ],
  },
  actions: {
    title: 'Territoire',
    list: [
      {
        icon: faPeopleSimple,
        to: RoutePageCoGardening,
        title: 'Co-jardiner',
      },
      {
        icon: faBuildingWheat,
        to: RoutePageSharedGardens,
        title: 'Jardins partagés',
      },
      {
        icon: faBuildingMemo,
        to: RoutePageGreeningPermit,
        title: 'Permis de végétaliser',
      },
      {
        icon: faHandHoldingHeart,
        to: RoutePageFoodSafety,
        title: 'Sécurité alimentaire',
      },
      {
        icon: faChartSimple,
        to: RoutePageData,
        title: 'Données',
      },
    ],
  },
};

const { api } = useTeraApi();

const { data: lands, refetch } = useQuery({
  queryKey: ['lands-first-five'],
  queryFn: async () => {
    const response = await api.GET('/api/lands', {
      params: {
        query: {
          itemsPerPage: 5,
        },
      },
    });
    return response.data;
  },
});

const { on: onLandPost } = useEventBus(landPostSucceededEvent);

onLandPost(() => {
  refetch();
  open.value = false;
});

const { on: onLandDelete } = useEventBus(landDeleteSucceededEvent);

onLandDelete(() => {
  refetch();
});

const { on: onLandUpdate } = useEventBus(landPatchSucceededEvent);

onLandUpdate(() => {
  refetch();
});

const { on: onLandMemberInvitationAccept } = useEventBus(landMemberInvitationAcceptSucceededEvent);

onLandMemberInvitationAccept(() => {
  refetch();
});

const { on: onLeaveLand } = useEventBus(landMemberLeaveSucceededEvent);

onLeaveLand(() => {
  refetch();
});

const mainMenus = [
  {
    icon: faClipboardListCheck,
    to: RoutePageLandTasks,
    title: 'Tâches',
  },
  {
    icon: faSunPlantWilt,
    to: RoutePageLandCultureItinaries,
    title: 'Itinéraires de culture',
  },
  {
    icon: faNotebook,
    to: RoutePageLandDiary,
    title: 'Journal',
  },
  {
    icon: faCalendarDays,
    to: RoutePageLandCalendars,
    title: 'Calendriers',
  },
];
</script>

<style scoped>
.menu-item.router-link-active {
  background-color: var(--color-surface);
}

.accordion-menu-item.router-link-active {
  :deep(button) {
    background-color: var(--color-surface);
  }
}
</style>
