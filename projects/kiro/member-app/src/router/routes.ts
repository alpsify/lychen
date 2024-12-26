import type { RouteRecordRaw } from 'vue-router';

import zitadelAuth from '@/services/ZitadelAuth';
import { RouteViewAssociation } from '@pages/association';
import { RouteViewAssociations } from '@pages/associations';
import { RouteViewContract } from '@pages/contract';
import { RouteViewContracts } from '@pages/contracts';
import { RouteViewCreateContractWithProducer } from '@pages/create-contract-with-producer';
import { RouteViewDashboard } from '@pages/dashboard';
import { RouteViewDistribution } from '@pages/distribution';
import { RouteViewDistributions } from '@pages/distributions';
import { RouteViewOnboarding } from '@pages/onboarding';
import { RouteViewProducer } from '@pages/producer';
import { RouteViewUserProfil } from '@pages/user-profil';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/in-app/LayoutInApp.vue'),
    meta: {
      authName: zitadelAuth.oidcAuth.authName,
    },
    children: [
      RouteViewUserProfil,
      RouteViewDashboard,
      RouteViewDistribution,
      RouteViewProducer,
      RouteViewContracts,
      RouteViewContract,
      RouteViewAssociation,
      RouteViewAssociations,
      RouteViewCreateContractWithProducer,
      RouteViewDistributions,
    ],
  },
  RouteViewOnboarding,
];

export default routes;
