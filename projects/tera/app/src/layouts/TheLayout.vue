<template>
  <LayoutInApp
    :menu-structure="navigation"
    :application="{ name: 'Tera' }"
  ></LayoutInApp>
</template>

<script setup lang="ts">
import LayoutInApp from '@lychen/vue-ui-layouts/in-app/LayoutInApp.vue';
import { faHouse } from '@fortawesome/pro-light-svg-icons/faHouse';
import { faClipboardListCheck } from '@fortawesome/pro-light-svg-icons/faClipboardListCheck';
import { faCalendarDays } from '@fortawesome/pro-light-svg-icons/faCalendarDays';
import { faSeedling } from '@fortawesome/pro-light-svg-icons/faSeedling';
import { faBagSeedling } from '@fortawesome/pro-light-svg-icons/faBagSeedling';
import { faFence } from '@fortawesome/pro-light-svg-icons/faFence';
import { faSunPlantWilt } from '@fortawesome/pro-light-svg-icons/faSunPlantWilt';
import { faNotebook } from '@fortawesome/pro-light-svg-icons/faNotebook';
import { faBuildingMemo } from '@fortawesome/pro-light-svg-icons/faBuildingMemo';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faPeopleSimple } from '@fortawesome/pro-light-svg-icons/faPeopleSimple';
import { faBuildingWheat } from '@fortawesome/pro-light-svg-icons/faBuildingWheat';
import { faChartSimple } from '@fortawesome/pro-light-svg-icons/faChartSimple';

import { RoutePageDashboard } from '@pages/dashboard';
import { RoutePageFoodSafety } from '../pages/food-safety';
import { RoutePageGreeningPermit } from '@/pages/greening-permit';
import { RoutePageCalendars } from '@/pages/calendars';
import { RoutePageCultureItinaries } from '@/pages/culture-itinaries';
import { RoutePageCoGardening } from '@/pages/co-gardening';
import { RoutePageDiary } from '@/pages/diary';
import { RoutePageData } from '@/pages/data';
import { RoutePageGrainLibrary } from '@/pages/grain-library';
import { RoutePagePlants } from '@/pages/plants';
import { RoutePageSharedGardens } from '@/pages/shared-gardens';
import { RoutePageTasks } from '@/pages/tasks';
import { RoutePageLands } from '@/pages/lands';

const navigation = {
  first: {
    list: [
      {
        icon: faHouse,
        to: RoutePageDashboard,
        title: 'Tableaux de bord',
      },
    ],
  },
  main: {
    list: [
      {
        icon: faFence,
        to: RoutePageLands,
        title: 'Espaces de culture',
      },
      {
        icon: faSunPlantWilt,
        to: RoutePageCultureItinaries,
        title: 'Itinéraires de culture',
      },
      {
        icon: faNotebook,
        to: RoutePageDiary,
        title: 'Journal',
      },
      {
        icon: faClipboardListCheck,
        to: RoutePageTasks,
        title: 'A faire',
      },
      {
        icon: faCalendarDays,
        to: RoutePageCalendars,
        title: 'Calendriers',
      },
    ],
  },
  resources: {
    title: 'Ressources',
    list: [
      {
        icon: faSeedling,
        to: RoutePagePlants,
        title: 'Plantes',
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
</script>
