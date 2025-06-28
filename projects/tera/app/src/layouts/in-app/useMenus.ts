import { faHouse } from '@fortawesome/pro-light-svg-icons/faHouse';
import { faSeedling } from '@fortawesome/pro-light-svg-icons/faSeedling';
import { faBagSeedling } from '@fortawesome/pro-light-svg-icons/faBagSeedling';
import { faBuildingMemo } from '@fortawesome/pro-light-svg-icons/faBuildingMemo';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faPeopleSimple } from '@fortawesome/pro-light-svg-icons/faPeopleSimple';
import { faBuildingWheat } from '@fortawesome/pro-light-svg-icons/faBuildingWheat';
import { faChartSimple } from '@fortawesome/pro-light-svg-icons/faChartSimple';

import { RoutePageFoodSafety } from '../../pages/food-safety';
import { RoutePageGreeningPermit } from '@/pages/greening-permit';
import { RoutePageCoGardening } from '@/pages/co-gardening/dashboard';

import { RoutePageData } from '@/pages/data';
import { RoutePageGrainLibrary } from '@/pages/grain-library';
import { RoutePageHerbarium } from '@/pages/herbarium';
import { RoutePageSharedGardens } from '@/pages/shared-gardens';
import { RoutePageLands } from '@/pages/lands';
import { type NavigationItem, type NavigationSection } from '@lychen/vue-layouts/in-app';

import { faClipboardListCheck } from '@fortawesome/pro-light-svg-icons/faClipboardListCheck';
import { faCalendarDays } from '@fortawesome/pro-light-svg-icons/faCalendarDays';
import { faSunPlantWilt } from '@fortawesome/pro-light-svg-icons/faSunPlantWilt';
import { faNotebook } from '@fortawesome/pro-light-svg-icons/faNotebook';

import { RoutePageLandCalendars } from '@/pages/land/calendars';
import { RoutePageLandCultureItinaries } from '@/pages/land/culture-itinaries';
import { RoutePageLandDiary } from '@/pages/land/diary';

import { RoutePageLandTasks } from '../../pages/land/tasks';
import { RoutePageLandDashboard } from '@/pages/land/dashboard';
import { faObjectsColumn } from '@fortawesome/pro-light-svg-icons/faObjectsColumn';

export default function useMenus() {
  const dashboardItem: NavigationItem = {
    icon: faHouse,
    to: RoutePageLands,
    label: 'Tableau de bord',
  };

  const dynamicLandSection: NavigationSection = {
    label: 'Espaces de culture',
  };

  const landSection: NavigationSection & { items: NavigationItem[] } = {
    label: 'Espaces de culture',
    items: [
      {
        icon: faObjectsColumn,
        to: RoutePageLandDashboard,
        label: 'Dashboard',
      },
      {
        icon: faClipboardListCheck,
        to: RoutePageLandTasks,
        label: 'Tâches',
      },
      {
        icon: faSunPlantWilt,
        to: RoutePageLandCultureItinaries,
        label: 'Itinéraires de culture',
      },
      {
        icon: faNotebook,
        to: RoutePageLandDiary,
        label: 'Journal',
      },
      {
        icon: faCalendarDays,
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
          icon: faSeedling,
          to: RoutePageHerbarium,
          label: 'Herbarium',
        },
        {
          icon: faBagSeedling,
          to: RoutePageGrainLibrary,
          label: 'Grainothèque',
        },
      ],
    },
    {
      label: 'Territoire',
      items: [
        {
          icon: faPeopleSimple,
          to: RoutePageCoGardening,
          label: 'Co-jardinage',
        },
        {
          icon: faBuildingWheat,
          to: RoutePageSharedGardens,
          label: 'Jardins partagés',
        },
        {
          icon: faBuildingMemo,
          to: RoutePageGreeningPermit,
          label: 'Permis de végétaliser',
        },
        {
          icon: faHandHoldingHeart,
          to: RoutePageFoodSafety,
          label: 'Sécurité alimentaire',
        },
        {
          icon: faChartSimple,
          to: RoutePageData,
          label: 'Données',
        },
      ],
    },
  ];

  return {
    dashboardItem,
    dynamicLandSection,
    landSection,
    menus,
  };
}
