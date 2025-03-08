export { default as PageData } from './PageData.vue';

export const RoutePageData = {
  path: '/data',
  component: () => import('./PageData.vue'),
  name: 'data',
};
