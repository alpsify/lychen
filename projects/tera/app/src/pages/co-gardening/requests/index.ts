export { default as PageCoGardeningRequests } from './PageCoGardeningRequests.vue';

export const RoutePageCoGardeningRequests = {
  path: 'requests',
  component: () => import('./PageCoGardeningRequests.vue'),
  name: 'co-gardening-requests',
};
