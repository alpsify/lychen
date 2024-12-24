import {
  messages as teraMessages,
  TRANSLATION_KEY as TERA_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n';
import {
  messages as mykoMessages,
  TRANSLATION_KEY as MYKO_TRANSLATION_KEY,
} from '@lychen/myko-ui-i18n';
import { Application, ApplicationAlias } from '@lychen/applications-util-model/Application';
import { computed } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { APPLICATION_STATE } from '@lychen/applications-util-constants/ApplicationState';
import { APPLICATION_ALIAS } from '@lychen/applications-util-constants/ApplicationAlias';

export function useApplicationsCatalog() {
  useI18nExtended({ messages: teraMessages, rootKey: TERA_TRANSLATION_KEY });
  useI18nExtended({ messages: mykoMessages, rootKey: MYKO_TRANSLATION_KEY });
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
      APPLICATION_ALIAS.Luna,
      APPLICATION_ALIAS.Novi,
      APPLICATION_ALIAS.Vara,
      APPLICATION_ALIAS.Kolo,
      APPLICATION_ALIAS.Eko,
    ];
    return Object.values(customOrder).map((alias) => {
      return generateAppInfo(alias);
    });
  });

  return {
    applicationsList,
    titleSortedApplicationsList,
    opiniatedApplicationsList,
  };
}
