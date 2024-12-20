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

  function generateAppInfo(alias: ApplicationAlias) {
    return {
      link: `https://${alias}.lychen.fr`,
      title: t(`${alias}.name`),
      description: t(`${alias}.description`),
      state: APPLICATION_STATE.Funding,
    };
  }

  const applicationsList = computed<Application[]>(() => {
    return Object.values(APPLICATION_ALIAS).map((alias) => {
      return generateAppInfo(alias);
    });
  });

  const sortedApplicationsList = computed<Application[]>(() => {
    return applicationsList.value.sort((a, b) =>
      a.title.toLowerCase().localeCompare(b.title.toLowerCase()),
    );
  });

  return {
    applicationsList,
    sortedApplicationsList,
  };
}
