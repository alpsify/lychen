import { type ApplicationState } from '@lychen/applications-util-model/Application';
import { type RouteRecordRaw } from 'vue-router';

export interface LayoutWebsiteApplicationNavigationProps {
  applicationState: ApplicationState;
  applicationName: string;
  routeHome: RouteRecordRaw;
}

export interface LayoutWebsiteApplicationFooterProps {
  applicationName: string;
}
