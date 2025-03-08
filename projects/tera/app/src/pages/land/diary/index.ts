export { default as PageLandDiary } from './PageLandDiary.vue';

export const RoutePageLandDiary = {
  path: 'diary',
  component: () => import('./PageLandDiary.vue'),
  name: 'land-diary',
};
