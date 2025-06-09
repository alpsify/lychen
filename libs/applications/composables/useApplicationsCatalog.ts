import {
  messages as teraMessages,
  TRANSLATION_KEY as TERA_TRANSLATION_KEY,
} from '@lychen/tera-i18n';
import {
  messages as mykoMessages,
  TRANSLATION_KEY as MYKO_TRANSLATION_KEY,
} from '@lychen/myko-i18n';
import {
  messages as kiroMessages,
  TRANSLATION_KEY as KIRO_TRANSLATION_KEY,
} from '@lychen/kiro-i18n';
import {
  messages as meliMessages,
  TRANSLATION_KEY as MELI_TRANSLATION_KEY,
} from '@lychen/meli-i18n';
import {
  messages as humuMessages,
  TRANSLATION_KEY as HUMU_TRANSLATION_KEY,
} from '@lychen/humu-i18n';
import {
  messages as koloMessages,
  TRANSLATION_KEY as KOLO_TRANSLATION_KEY,
} from '@lychen/kolo-i18n';
import {
  messages as varaMessages,
  TRANSLATION_KEY as VARA_TRANSLATION_KEY,
} from '@lychen/vara-i18n';
import { messages as ekoMessages, TRANSLATION_KEY as EKO_TRANSLATION_KEY } from '@lychen/eko-i18n';
import {
  messages as noviMessages,
  TRANSLATION_KEY as NOVI_TRANSLATION_KEY,
} from '@lychen/novi-i18n';
import {
  messages as lunaMessages,
  TRANSLATION_KEY as LUNA_TRANSLATION_KEY,
} from '@lychen/luna-i18n';
import {
  messages as robustMessages,
  TRANSLATION_KEY as ROBUST_TRANSLATION_KEY,
} from '@lychen/robust-i18n';
import { type Application, type ApplicationAlias } from '@lychen/applications-model/Application';
import { computed } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { APPLICATION_STATE } from '@lychen/applications-constants/ApplicationState';
import { APPLICATION_ALIAS } from '@lychen/applications-constants/ApplicationAlias';

export function useApplicationsCatalog() {
  useI18nExtended({ messages: teraMessages, rootKey: TERA_TRANSLATION_KEY });
  useI18nExtended({ messages: mykoMessages, rootKey: MYKO_TRANSLATION_KEY });
  useI18nExtended({ messages: kiroMessages, rootKey: KIRO_TRANSLATION_KEY });
  useI18nExtended({ messages: meliMessages, rootKey: MELI_TRANSLATION_KEY });
  useI18nExtended({ messages: humuMessages, rootKey: HUMU_TRANSLATION_KEY });
  useI18nExtended({ messages: koloMessages, rootKey: KOLO_TRANSLATION_KEY });
  useI18nExtended({ messages: varaMessages, rootKey: VARA_TRANSLATION_KEY });
  useI18nExtended({ messages: ekoMessages, rootKey: EKO_TRANSLATION_KEY });
  useI18nExtended({ messages: noviMessages, rootKey: NOVI_TRANSLATION_KEY });
  useI18nExtended({ messages: lunaMessages, rootKey: LUNA_TRANSLATION_KEY });
  useI18nExtended({ messages: robustMessages, rootKey: ROBUST_TRANSLATION_KEY });
  const { t } = useI18nExtended();

  function generateAppInfo(alias: ApplicationAlias): Application {
    return {
      link: `https://${alias}.lychen.fr`,
      title: t(`${alias}.name`),
      description: t(`${alias}.description`),
      state: APPLICATION_STATE.Funding,
      alias,
    };
  }

  const applicationsList = computed<Application[]>(() => {
    return Object.values(APPLICATION_ALIAS).map((alias) => {
      return generateAppInfo(alias);
    });
  });

  const titleSortedApplicationsList = computed<Application[]>(() => {
    return applicationsList.value.sort((a, b) =>
      a.title.toLowerCase().localeCompare(b.title.toLowerCase()),
    );
  });

  const opiniatedApplicationsList = computed<Application[]>(() => {
    const customOrder = [
      APPLICATION_ALIAS.Tera,
      APPLICATION_ALIAS.Myko,
      APPLICATION_ALIAS.Meli,
      APPLICATION_ALIAS.Kiro,
      APPLICATION_ALIAS.Humu,
      //APPLICATION_ALIAS.Luna,
      APPLICATION_ALIAS.Novi,
      APPLICATION_ALIAS.Vara,
      APPLICATION_ALIAS.Kolo,
      //APPLICATION_ALIAS.Eko,
    ];
    return Object.values(customOrder).map((alias) => {
      return generateAppInfo(alias);
    });
  });

  return {
    applicationsList,
    titleSortedApplicationsList,
    opiniatedApplicationsList,
    getAppInfo: generateAppInfo,
  };
}
