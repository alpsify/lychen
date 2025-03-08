export { default as PageLandCultureItinaries } from './PageLandCultureItinaries.vue';

export const RoutePageLandCultureItinaries = {
  path: 'culture-itinaries',
  component: () => import('./PageLandCultureItinaries.vue'),
  name: 'land-culture-itinaries',
};
