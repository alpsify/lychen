export { default as PageOnboarding } from './PageOnboarding.vue';

export const RoutePageOnboarding = {
  path: '/onboarding',
  component: () => import('./PageOnboarding.vue'),
  name: 'onboarding',
};
