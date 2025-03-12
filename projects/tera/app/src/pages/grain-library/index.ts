export { default as PageGrainLibrary } from './PageGrainLibrary.vue';

export const RoutePageGrainLibrary = {
  path: '/grain-library',
  component: () => import('./PageGrainLibrary.vue'),
  name: 'grain-library',
};
