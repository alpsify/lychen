import { APP_ALIAS as TERA_APP_ALIAS } from '@lychen/tera-constants/App';
import { APP_ALIAS as MYKO_APP_ALIAS } from '@lychen/myko-constants/App';
import { APP_ALIAS as KIRO_APP_ALIAS } from '@lychen/kiro-constants/App';
import { APP_ALIAS as MELI_APP_ALIAS } from '@lychen/meli-constants/App';
import { APP_ALIAS as HUMU_APP_ALIAS } from '@lychen/humu-constants/App';
import { APP_ALIAS as KOLO_APP_ALIAS } from '@lychen/kolo-constants/App';
import { APP_ALIAS as VARA_APP_ALIAS } from '@lychen/vara-constants/App';
import { APP_ALIAS as EKO_APP_ALIAS } from '@lychen/eko-constants/App';
import { APP_ALIAS as NOVI_APP_ALIAS } from '@lychen/novi-constants/App';
import { APP_ALIAS as LUNA_APP_ALIAS } from '@lychen/luna-constants/App';
import { APP_ALIAS as ROBUST_APP_ALIAS } from '@lychen/robust-constants/App';

export const APPLICATION_ALIAS = {
  Kiro: KIRO_APP_ALIAS,
  Luna: LUNA_APP_ALIAS,
  Eko: EKO_APP_ALIAS,
  Humu: HUMU_APP_ALIAS,
  Novi: NOVI_APP_ALIAS,
  Vara: VARA_APP_ALIAS,
  Meli: MELI_APP_ALIAS,
  Kolo: KOLO_APP_ALIAS,
  Tera: TERA_APP_ALIAS,
  Myko: MYKO_APP_ALIAS,
  Robust: ROBUST_APP_ALIAS,
} as const;
