import type { RouteRecordRaw } from 'vue-router';

import { RoutePageHome } from '@/pages/home';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@/layouts/TheLayout.vue'),
    children: [RoutePageHome],
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: RoutePageHome,
  },
];

export default routes;
