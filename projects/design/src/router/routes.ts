import type { RouteRecordRaw } from 'vue-router';

import { RoutePageHome } from '@pages/home';
import { RoutePageColors } from '../pages/colors';
import { RoutePagePersonas } from '@/pages/personas';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/TheLayout.vue'),
    children: [RoutePageHome, RoutePageColors, RoutePagePersonas],
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: RoutePageHome,
  },
];

export default routes;
