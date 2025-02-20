import { APP_ALIAS as TERA_APP_ALIAS } from '@lychen/tera-util-constants/App';
import { APP_ALIAS as MYKO_APP_ALIAS } from '@lychen/myko-util-constants/App';
import { APP_ALIAS as KIRO_APP_ALIAS } from '@lychen/kiro-util-constants/App';
import { APP_ALIAS as MELI_APP_ALIAS } from '@lychen/meli-util-constants/App';
import { APP_ALIAS as HUMU_APP_ALIAS } from '@lychen/humu-util-constants/App';
import { APP_ALIAS as KOLO_APP_ALIAS } from '@lychen/kolo-util-constants/App';
import { APP_ALIAS as VARA_APP_ALIAS } from '@lychen/vara-util-constants/App';
import { APP_ALIAS as EKO_APP_ALIAS } from '@lychen/eko-util-constants/App';
import { APP_ALIAS as NOVI_APP_ALIAS } from '@lychen/novi-util-constants/App';
import { APP_ALIAS as LUNA_APP_ALIAS } from '@lychen/luna-util-constants/App';
import { APP_ALIAS as ROBUST_APP_ALIAS } from '@lychen/robust-util-constants/App';

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
