export { default as PagePlants } from './PagePlants.vue';

export const RoutePagePlants = {
  path: '/plants',
  component: () => import('./PagePlants.vue'),
  name: 'plants',
};
