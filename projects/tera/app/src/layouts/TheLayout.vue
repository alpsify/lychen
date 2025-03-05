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
import { RoutePageDashboard } from '@/pages/dashboard';

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
        icon: faClipboardListCheck,
        to: RoutePageDashboard.name,
        title: 'Espaces de culture',
      },
      {
        icon: faClipboardListCheck,
        to: RoutePageDashboard.name,
        title: 'A faire',
      },
      {
        icon: faCalendarDays,
        to: RoutePageDashboard.name,
        title: 'Calendrier',
      },
    ],
  },
  resources: {
    title: 'Resources',
    list: [
      {
        icon: faSeedling,
        to: RoutePageDashboard.name,
        title: 'Herbier',
      },
      {
        icon: faBagSeedling,
        to: RoutePageDashboard.name,
        title: 'Grainothèque',
      },
    ],
  },
};
</script>
