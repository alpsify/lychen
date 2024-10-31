export { default as ViewFeed } from './ViewFeed.vue';

export const RouteViewFeed = {
  path: '/feed',
  component: () => import('./ViewFeed.vue'),
  name: 'feed',
};
