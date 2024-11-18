export { default as PageHome } from './PageHome.vue';

export const RoutePageHome = {
  path: '/',
  component: () => import('./PageHome.vue'),
  name: 'home',
};
