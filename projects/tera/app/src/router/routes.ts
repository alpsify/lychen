import type { RouteRecordRaw } from 'vue-router';

import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { RoutePageDashboard } from '@pages/dashboard';
import { RoutePageOnboarding } from '@pages/onboarding';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/in-app/LayoutInApp.vue'),
    meta: {
      authName: zitadelAuth.oidcAuth.authName,
    },
    children: [RoutePageDashboard],
  },
  RoutePageOnboarding,
];

export default routes;
