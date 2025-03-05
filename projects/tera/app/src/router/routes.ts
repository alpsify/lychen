import type { RouteRecordRaw } from 'vue-router';

import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { RoutePageDashboard } from '@pages/dashboard';
import { RoutePageOnboarding } from '@pages/onboarding';
import { RoutePageLand } from '@pages/land';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/TheLayout.vue'),
    meta: {
      authName: zitadelAuth.oidcAuth.authName,
    },
    children: [RoutePageDashboard, RoutePageLand],
  },
  RoutePageOnboarding,
];

export default routes;
