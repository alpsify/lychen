import type { IconDefinition } from '@fortawesome/pro-light-svg-icons';

import type { RouteLocationAsPathGeneric, RouteLocationAsRelativeGeneric } from 'vue-router';

export interface NavigationItem {
  label: string;
  icon?: IconDefinition;
  to: string | RouteLocationAsRelativeGeneric | RouteLocationAsPathGeneric;
}

export interface NavigationSection {
  title?: string;
}

export type Navigation = NavigationSection[];
