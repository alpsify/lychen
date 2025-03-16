export { default as PageLandSettings } from './PageLandSettings.vue';

export const RoutePageLandSettings = {
  path: 'settings',
  component: () => import('./PageLandSettings.vue'),
  name: 'land-settings',
};
