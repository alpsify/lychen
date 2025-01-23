export { default as PageDashboard } from './PageDashboard.vue';

export const RoutePageDashboard = {
  path: '/dashboard',
  component: () => import('./PageDashboard.vue'),
  name: 'dashboard',
};
