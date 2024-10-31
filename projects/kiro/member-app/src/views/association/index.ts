export { default as ViewAssociation } from './ViewAssociation.vue';

export const RouteViewAssociation = {
  path: '/association/:uuid',
  component: () => import('./ViewAssociation.vue'),
  name: 'association',
};
