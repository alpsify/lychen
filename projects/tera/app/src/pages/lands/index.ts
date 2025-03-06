export { default as PageLands } from './PageLands.vue';

export const RoutePageLands = {
  path: '/lands',
  component: () => import('./PageLands.vue'),
  name: 'lands',
};
