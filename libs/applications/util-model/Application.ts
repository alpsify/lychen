import { APPLICATION_ALIAS } from '@lychen/applications-util-constants/ApplicationAlias';
import { APPLICATION_STATE } from '@lychen/applications-util-constants/ApplicationState';
import { ObjectValues } from '@lychen/typescript-util-object/Object';

export interface Application {
  link: string;
  title: string;
  description: string;
  state: ApplicationState;
  alias: ApplicationAlias;
}

export type ApplicationAlias = ObjectValues<typeof APPLICATION_ALIAS>;

export type ApplicationState = ObjectValues<typeof APPLICATION_STATE>;
