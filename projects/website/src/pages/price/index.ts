export { default as PagePrice } from './PagePrice.vue';

export const RoutePagePrice = {
  path: '/tarifs',
  component: () => import('./PagePrice.vue'),
  name: 'price',
};
