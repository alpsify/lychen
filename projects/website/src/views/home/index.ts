export const ROUTE_HOME = {
  path: '/',
  component: () => import('./PageHome.vue'),
  name: 'home',
} as const;
