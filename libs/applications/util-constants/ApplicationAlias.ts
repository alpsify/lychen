import { APP_ALIAS as TERA_APP_ALIAS } from '@lychen/tera-util-constants/App';
import { APP_ALIAS as MYKO_APP_ALIAS } from '@lychen/myko-util-constants/App';
import { APP_ALIAS as KIRO_APP_ALIAS } from '@lychen/kiro-util-constants/App';
import { APP_ALIAS as MELI_APP_ALIAS } from '@lychen/meli-util-constants/App';

export const APPLICATION_ALIAS = {
  Kiro: KIRO_APP_ALIAS,
  Luna: 'luna',
  Eko: 'eko',
  Humu: 'humu',
  Novi: 'novi',
  Vara: 'vara',
  Meli: MELI_APP_ALIAS,
  Kolo: 'kolo',
  Tera: TERA_APP_ALIAS,
  Myko: MYKO_APP_ALIAS,
} as const;
