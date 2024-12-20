import { ApplicationState } from './ApplicationState';

export interface Application {
  link: string;
  title: string;
  description: string;
  state: ApplicationState;
}
