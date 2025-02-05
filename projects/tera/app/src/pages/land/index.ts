export { default as PageLand } from './PageLand.vue';

export const RoutePageLand = {
  path: '/land/:ulid',
  component: () => import('./PageLand.vue'),
  name: 'land',
};
