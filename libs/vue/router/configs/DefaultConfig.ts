import { type RouteRecordRaw } from 'vue-router';
import { scrollBehavior } from './ScrollBehavior';

export function buildConfigObject(routes: RouteRecordRaw[]) {
  return {
    scrollBehavior,
    routes,
    base: import.meta.env.BASE_URL,
  };
}
