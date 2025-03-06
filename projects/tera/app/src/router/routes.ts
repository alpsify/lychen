import type { RouteRecordRaw } from 'vue-router';

import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { RoutePageDashboard } from '@pages/dashboard';
import { RoutePageOnboarding } from '@pages/onboarding';
import { RoutePageLand } from '@pages/land';
import { RoutePageFoodSafety } from '../pages/food-safety';
import { RoutePageGreeningPermit } from '@/pages/greening-permit';
import { RoutePageCalendars } from '@/pages/calendars';
import { RoutePageCultureItinaries } from '@/pages/culture-itinaries';
import { RoutePageCoGardening } from '@/pages/co-gardening';
import { RoutePageDiary } from '@/pages/diary';
import { RoutePageData } from '@/pages/data';
import { RoutePageGrainLibrary } from '@/pages/grain-library';
import { RoutePageHerbarium } from '@/pages/herbarium';
import { RoutePageSharedGardens } from '@/pages/shared-gardens';
import { RoutePageTasks } from '@/pages/tasks';
import { RoutePageLands } from '@/pages/lands';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('@layouts/TheLayout.vue'),
    meta: {
      authName: zitadelAuth.oidcAuth.authName,
    },
    children: [
      RoutePageDashboard,
      RoutePageLand,
      RoutePageFoodSafety,
      RoutePageGreeningPermit,
      RoutePageCalendars,
      RoutePageCultureItinaries,
      RoutePageCoGardening,
      RoutePageDiary,
      RoutePageData,
      RoutePageGrainLibrary,
      RoutePageHerbarium,
      RoutePageSharedGardens,
      RoutePageTasks,
      RoutePageLands,
    ],
  },
  RoutePageOnboarding,
  {
    path: '/:pathMatch(.*)*',
    redirect: RoutePageDashboard,
  },
];

export default routes;
