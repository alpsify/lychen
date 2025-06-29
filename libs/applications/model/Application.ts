import { APPLICATION_ALIAS } from '@lychen/applications-constants/ApplicationAlias';
import { APPLICATION_STATE } from '@lychen/applications-constants/ApplicationState';
import { type ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export interface Application {
  link: string;
  title: string;
  description: string;
  state: ApplicationState;
  alias: ApplicationAlias;
}

export type ApplicationAlias = ObjectValues<typeof APPLICATION_ALIAS>;

export type ApplicationState = ObjectValues<typeof APPLICATION_STATE>;
