export { default as PageLandCalendars } from './PageLandCalendars.vue';

export const RoutePageLandCalendars = {
  path: 'calendars',
  component: () => import('./PageLandCalendars.vue'),
  name: 'land-calendars',
};
