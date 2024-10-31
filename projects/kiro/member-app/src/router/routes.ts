import { RouteRecordRaw } from 'vue-router';

import zitadelAuth from '@/services/ZitadelAuth';
import { RouteViewAssociation } from '@/views/association';
import { RouteViewAssociations } from '@/views/associations';
import { RouteViewContract } from '@/views/contract';
import { RouteViewContracts } from '@/views/contracts';
import { RouteViewCreateContractWithProducer } from '@/views/create-contract-with-producer';
import { RouteViewDashboard } from '@/views/dashboard';
import { RouteViewDistribution } from '@/views/distribution';
import { RouteViewDistributions } from '@/views/distributions';
import { RouteViewOnboarding } from '@/views/onboarding';
import { RouteViewProducer } from '@/views/producer';
import { RouteViewUserProfil } from '@/views/user-profil';

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
