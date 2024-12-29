import { ApplicationState } from '@lychen/applications-util-model/Application';
import { type RouteRecordRaw } from 'vue-router';

export interface LayoutApplicationNavigationProps {
  applicationState: ApplicationState;
  applicationName: string;
  routeHome: RouteRecordRaw;
}

export interface LayoutApplicationFooterProps {
  applicationName: string;
}
