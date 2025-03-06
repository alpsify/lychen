export { default as PageDiary } from './PageDiary.vue';

export const RoutePageDiary = {
  path: '/diary',
  component: () => import('./PageDiary.vue'),
  name: 'diary',
};
