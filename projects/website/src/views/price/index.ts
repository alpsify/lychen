export const ROUTE_PRICE = {
  path: '/tarifs',
  component: () => import('./PagePrice.vue'),
  name: 'price',
} as const;
