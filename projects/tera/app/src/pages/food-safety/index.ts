export { default as PageFoodSafety } from './PageFoodSafety.vue';

export const RoutePageFoodSafety = {
  path: '/food-safety',
  component: () => import('./PageFoodSafety.vue'),
  name: 'food-safety',
};
