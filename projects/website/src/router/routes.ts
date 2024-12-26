import type { RouteRecordRaw } from 'vue-router';

import { RoutePagePrice } from '@pages/price';
import { RoutePageHome } from '@pages/home';
import { RoutePageManifest } from '@pages/manifest';
import { RoutePageSponsor } from '@pages/sponsor';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/main/LayoutMain.vue'),
    children: [RoutePageHome, RoutePagePrice, RoutePageManifest, RoutePageSponsor],
  },
];

export default routes;
