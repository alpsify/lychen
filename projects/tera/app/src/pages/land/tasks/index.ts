export { default as PageLandTasks } from './PageLandTasks.vue';

export const RoutePageLandTasks = {
  path: 'tasks',
  component: () => import('./PageLandTasks.vue'),
  name: 'land-tasks',
};
