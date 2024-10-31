export { default as ViewOnboarding } from './ViewOnboarding.vue';

export const RouteViewOnboarding = {
  path: '/onboarding',
  component: () => import('./ViewOnboarding.vue'),
  name: 'onboarding',
};
