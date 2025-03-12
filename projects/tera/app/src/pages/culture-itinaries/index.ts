export { default as PageCultureItinaries } from './PageCultureItinaries.vue';

export const RoutePageCultureItinaries = {
  path: '/culture-itinaries',
  component: () => import('./PageCultureItinaries.vue'),
  name: 'culture-itinaries',
};
