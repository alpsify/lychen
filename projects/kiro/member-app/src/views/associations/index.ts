export { default as ViewAssociations } from './ViewAssociations.vue';

export const RouteViewAssociations = {
  path: '/associations',
  component: () => import('./ViewAssociations.vue'),
  name: 'associations',
};
