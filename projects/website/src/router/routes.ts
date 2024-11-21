import type { RouteRecordRaw } from 'vue-router';

import { RoutePagePrice } from '@/pages/price';
import { RoutePageHome } from '@/pages/home';
import { RoutePageManifest } from '@/pages/manifest';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/main/LayoutMain.vue'),
    children: [RoutePageHome, RoutePagePrice, RoutePageManifest],
  },
];

export default routes;
