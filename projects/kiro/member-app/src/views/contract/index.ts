export { default as ViewContract } from './ViewContract.vue';

export const RouteViewContract = {
  path: '/contract/:uuid',
  component: () => import('./ViewContract.vue'),
  name: 'contract',
};
