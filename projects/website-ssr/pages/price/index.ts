export { default as ViewPrice } from './ViewPrice.vue';

export const RouteViewPrice = {
  path: '/tarifs',
  component: () => import('./ViewPrice.vue'),
  name: 'price',
};
