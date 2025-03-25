export { default as PageLandMemberSettings } from './PageLandMemberSettings.vue';

export const RoutePageLandMemberSettings = {
  path: 'member-settings',
  component: () => import('./PageLandMemberSettings.vue'),
  name: 'land-member-settings',
};
