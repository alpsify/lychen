export { default as PageCalendars } from './PageCalendars.vue';

export const RoutePageCalendars = {
  path: '/calendars',
  component: () => import('./PageCalendars.vue'),
  name: 'calendars',
};
