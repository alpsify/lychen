import type { IconDefinition } from '@fortawesome/free-brands-svg-icons';
import type { RouteLocationAsPathGeneric, RouteLocationAsRelativeGeneric } from 'vue-router';

export interface MenuStructure {
  [key: string]: {
    title?: string;
    list?: MenuItem[];
  };
}

export interface MenuItem {
  to: string | RouteLocationAsRelativeGeneric | RouteLocationAsPathGeneric;
  icon: IconDefinition;
  title: string;
}
