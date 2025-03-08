export { default as PageSharedGardens } from './PageSharedGardens.vue';

export const RoutePageSharedGardens = {
  path: '/shared-gardens',
  component: () => import('./PageSharedGardens.vue'),
  name: 'shared-gardens',
};
