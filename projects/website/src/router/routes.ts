import type { RouteRecordRaw } from 'vue-router';

import { RouteViewPrice } from '@/views/price';
import { RouteViewHome } from '@/views/home';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/main/LayoutMain.vue'),
    children: [RouteViewHome, RouteViewPrice],
  },
];

export default routes;
