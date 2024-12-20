import { useTranslations, TRANSLATION_KEY } from '@lychen/applications-ui-i18n';
import { Application } from '@lychen/applications-util-model/Application';
import {
  ApplicationAlias,
  APPLICATION_ALIAS,
} from '@lychen/applications-util-model/ApplicationAlias';
import { APPLICATION_STATE } from '@lychen/applications-util-model/ApplicationState';
import { computed } from 'vue';

export function useApplicationsCatalog() {
  const { t } = useTranslations();

  function generateAppInfo(alias: ApplicationAlias) {
    return {
      link: `https://${alias}.lychen.fr`,
      title: t(`${TRANSLATION_KEY}.${alias}.name`),
      description: t(`${TRANSLATION_KEY}.${alias}.description`),
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
