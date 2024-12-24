import { APP_ALIAS as TERA_APP_ALIAS } from '@lychen/tera-util-constants/App';
import { APP_ALIAS as MYKO_APP_ALIAS } from '@lychen/myko-util-constants/App';

export const APPLICATION_ALIAS = {
  Kiro: 'kiro',
  Luna: 'luna',
  Eko: 'eko',
  Humu: 'humu',
  Novi: 'novi',
  Vara: 'vara',
  Meli: 'meli',
  Kolo: 'kolo',
  Tera: TERA_APP_ALIAS,
  Myko: MYKO_APP_ALIAS,
} as const;
