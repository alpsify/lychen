export { default as PageGreeningPermit } from './PageGreeningPermit.vue';

export const RoutePageGreeningPermit = {
  path: '/greening-permit',
  component: () => import('./PageGreeningPermit.vue'),
  name: 'greening-permit',
};
