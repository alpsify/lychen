export { default as PageCoGardening } from './PageCoGardening.vue';

export const RoutePageCoGardening = {
  path: '/co-gardening',
  component: () => import('./PageCoGardening.vue'),
  name: 'co-gardening',
};
