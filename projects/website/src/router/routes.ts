import type { RouteRecordRaw } from 'vue-router';

import { RoutePagePrice } from '@/pages/price';
import { RoutePageHome } from '@/pages/home';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/main/LayoutMain.vue'),
    children: [RoutePageHome, RoutePagePrice],
  },
];

export default routes;
