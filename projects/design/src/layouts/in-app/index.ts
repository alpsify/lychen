import type { RouteLocationAsPathGeneric, RouteLocationAsRelativeGeneric } from 'vue-router';

export interface NavigationItem {
  label: string;
  to: string | RouteLocationAsRelativeGeneric | RouteLocationAsPathGeneric;
}

export interface NavigationSection {
  title?: string;
}

export type Navigation = NavigationSection[];
