import type { RouteRecordRaw } from 'vue-router';

import { RoutePageHome } from '@pages/home';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/LayoutMain.vue'),
    children: [RoutePageHome],
  },
];

export default routes;
