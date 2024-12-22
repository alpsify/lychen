import { ObjectValues } from '@lychen/typescript-util-object/Object';

export const APPLICATION_STATE = {
  Funding: 'funding',
  Development: 'development',
} as const;

export type ApplicationState = ObjectValues<typeof APPLICATION_STATE>;
