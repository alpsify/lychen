export { default as PageHerbarium } from './PageHerbarium.vue';

export const RoutePageHerbarium = {
  path: '/herbarium',
  component: () => import('./PageHerbarium.vue'),
  name: 'herbarium',
};
