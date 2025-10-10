import { RoutePageFoodSafety } from '../../pages/food-safety';
import { RoutePageGreeningPermit } from '@/pages/greening-permit';
import { RoutePageCoGardening } from '@/pages/co-gardening/dashboard';

import { RoutePageData } from '@/pages/data';
import { RoutePageGrainLibrary } from '@/pages/grain-library';
import { RoutePageHerbarium } from '@/pages/herbarium';
import { RoutePageSharedGardens } from '@/pages/shared-gardens';
import { type NavigationItem, type NavigationSection } from '@lychen/vue-layouts/in-app';

import { RoutePageLandCalendars } from '@/pages/land/calendars';
import { RoutePageLandCultureItinaries } from '@/pages/land/culture-itinaries';
import { RoutePageLandDiary } from '@/pages/land/diary';

import { RoutePageLandTasks } from '../../pages/land/tasks';
import { RoutePageLandDashboard } from '@/pages/land/dashboard';

export default function useMenus() {
  const dynamicLandSection: NavigationSection = {
    label: 'Espaces de culture',
  };

  const landSection: NavigationSection & { items: NavigationItem[] } = {
    label: 'Espaces de culture',
    items: [
      {
        to: RoutePageLandDashboard,
        label: 'Dashboard',
      },
      {
        to: RoutePageLandTasks,
        label: 'Tâches',
      },
      {
        to: RoutePageLandCultureItinaries,
        label: 'Itinéraires de culture',
      },
      {
        to: RoutePageLandDiary,
        label: 'Journal',
      },
      {
        to: RoutePageLandCalendars,
        label: 'Calendriers',
      },
    ],
  };

  const menus = [
    {
      label: 'Ressources',
      items: [
        {
          to: RoutePageHerbarium,
          label: 'Herbarium',
        },
        {
          to: RoutePageGrainLibrary,
          label: 'Grainothèque',
        },
      ],
    },
    {
      label: 'Territoire',
      items: [
        {
          to: RoutePageCoGardening,
          label: 'Co-jardinage',
        },
        {
          to: RoutePageSharedGardens,
          label: 'Jardins partagés',
        },
        {
          to: RoutePageGreeningPermit,
          label: 'Permis de végétaliser',
        },
        {
          to: RoutePageFoodSafety,
          label: 'Sécurité alimentaire',
        },
        {
          to: RoutePageData,
          label: 'Données',
        },
      ],
    },
  ];

  return {
    dynamicLandSection,
    landSection,
    menus,
  };
}
