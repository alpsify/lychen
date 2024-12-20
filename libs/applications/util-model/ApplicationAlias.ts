import { ObjectValues } from '@lychen/typescript-util-object/Object';

export const APPLICATION_ALIAS = {
  Kiro: 'kiro',
  Luna: 'luna',
  Eko: 'eko',
  Humu: 'humu',
  Novi: 'novi',
  Vara: 'vara',
  Meli: 'meli',
  Kolo: 'kolo',
  Tera: 'tera',
  Myko: 'myko',
} as const;

export type ApplicationAlias = ObjectValues<typeof APPLICATION_ALIAS>;
