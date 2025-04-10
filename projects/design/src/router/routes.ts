import type { RouteRecordRaw } from 'vue-router';

import { RoutePageHome } from '@pages/home';
import { RoutePageColors } from '../pages/colors';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/TheLayout.vue'),
    children: [RoutePageColors],
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: RoutePageHome,
  },
];

export default routes;
