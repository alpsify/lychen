export { default as PageCoGardeningProposals } from './PageCoGardeningProposals.vue';

export const RoutePageCoGardeningProposals = {
  path: 'proposals',
  component: () => import('./PageCoGardeningProposals.vue'),
  name: 'co-gardening-proposals',
};
