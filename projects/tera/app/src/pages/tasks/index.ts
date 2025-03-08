export { default as PageTasks } from './PageTasks.vue';

export const RoutePageTasks = {
  path: '/tasks',
  component: () => import('./PageTasks.vue'),
  name: 'tasks',
};
