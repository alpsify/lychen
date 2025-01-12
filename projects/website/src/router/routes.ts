import type { RouteRecordRaw } from 'vue-router';

import { RoutePagePrice } from '@pages/price';
import { RoutePageHome } from '@pages/home';
import { RoutePageManifest } from '@pages/manifest';
import { RoutePageSponsor } from '@pages/sponsor';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/TheLayout.vue'),
    children: [RoutePageHome, RoutePagePrice, RoutePageManifest, RoutePageSponsor],
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: RoutePageHome,
  },
];

export default routes;
