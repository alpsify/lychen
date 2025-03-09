export { default as PageLandDashboard } from './PageLandDashboard.vue';

export const RoutePageLandDashboard = {
  path: '',
  component: () => import('./PageLandDashboard.vue'),
  name: 'land-dashboard',
};
