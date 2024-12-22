import { messages, TRANSLATION_KEY } from '@lychen/applications-ui-i18n';
import { Application } from '@lychen/applications-util-model/Application';
import {
  ApplicationAlias,
  APPLICATION_ALIAS,
} from '@lychen/applications-util-model/ApplicationAlias';
import { APPLICATION_STATE } from '@lychen/applications-util-model/ApplicationState';
import { computed } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

export function useApplicationsCatalog() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

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
