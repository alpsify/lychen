<template>
  <LayoutInApp
    :menus="navigation"
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
import { RoutePageDashboard } from '@/pages/dashboard';
import { faNotebook } from '@fortawesome/pro-light-svg-icons/faNotebook';
import { faBuildingMemo } from '@fortawesome/pro-light-svg-icons/faBuildingMemo';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faPeopleSimple } from '@fortawesome/pro-light-svg-icons/faPeopleSimple';
import { faBuildingWheat } from '@fortawesome/pro-light-svg-icons/faBuildingWheat';
import { faChartSimple } from '@fortawesome/pro-light-svg-icons/faChartSimple';

const navigation = {
  first: {
    list: [
      {
        icon: faHouse,
        to: RoutePageDashboard.name,
        title: 'Tableaux de bord',
      },
    ],
  },
  main: {
    list: [
      {
        icon: faFence,
        to: RoutePageDashboard.name,
        title: 'Espaces de culture',
      },
      {
        icon: faSunPlantWilt,
        to: RoutePageDashboard.name,
        title: 'Itinéraires de culture',
      },
      {
        icon: faNotebook,
        to: RoutePageDashboard.name,
        title: 'Journal',
      },
      {
        icon: faClipboardListCheck,
        to: RoutePageDashboard.name,
        title: 'A faire',
      },
      {
        icon: faCalendarDays,
        to: RoutePageDashboard.name,
        title: 'Calendriers',
      },
    ],
  },
  resources: {
    title: 'Ressources',
    list: [
      {
        icon: faSeedling,
        to: RoutePageDashboard.name,
        title: 'Plantes',
      },
      {
        icon: faBagSeedling,
        to: RoutePageDashboard.name,
        title: 'Grainothèque',
      },
    ],
  },
  actions: {
    title: 'Territoire',
    list: [
      {
        icon: faPeopleSimple,
        to: RoutePageDashboard.name,
        title: 'Co-jardiner',
      },
      {
        icon: faBuildingWheat,
        to: RoutePageDashboard.name,
        title: 'Jardins partagés',
      },
      {
        icon: faBuildingMemo,
        to: RoutePageDashboard.name,
        title: 'Permis de végétaliser',
      },
      {
        icon: faHandHoldingHeart,
        to: RoutePageDashboard.name,
        title: 'Sécurité alimentaire',
      },
      {
        icon: faChartSimple,
        to: RoutePageDashboard.name,
        title: 'Données',
      },
    ],
  },
};
</script>
