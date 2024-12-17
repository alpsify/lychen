import { ObjectValues } from '@lychen/ui-components/lib/utils';
import { computed } from 'vue';

import { TRANSLATION_KEY, useTranslations } from './i18n';

export const APPLICATION_STATE = {
  Funding: 'funding',
  Development: 'development',
} as const;

export type ApplicationState = ObjectValues<typeof APPLICATION_STATE>;

export interface Application {
  link: string;
  title: string;
  description: string;
  logo: string;
  state: ApplicationState;
}

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

export const APPLICATION_LINK = {
  [APPLICATION_ALIAS.Kiro]: 'kiro.lychen.fr',
  [APPLICATION_ALIAS.Luna]: 'luna.lychen.fr',
  [APPLICATION_ALIAS.Eko]: 'eko.lychen.fr',
  [APPLICATION_ALIAS.Humu]: 'humu.lychen.fr',
  [APPLICATION_ALIAS.Novi]: 'novi.lychen.fr',
  [APPLICATION_ALIAS.Vara]: 'vara.lychen.fr',
  [APPLICATION_ALIAS.Meli]: 'meli.lychen.fr',
  [APPLICATION_ALIAS.Kolo]: 'kolo.lychen.fr',
  [APPLICATION_ALIAS.Tera]: 'tera.lychen.fr',
  [APPLICATION_ALIAS.Myko]: 'myko.lychen.fr',
} as const;

export function useApplications() {
  const { t } = useTranslations();

  function generateAppInfo(alias: ApplicationAlias) {
    return {
      link: 'https://' + APPLICATION_LINK[alias],
      title: t(`${TRANSLATION_KEY}.${alias}.name`),
      description: t(`${TRANSLATION_KEY}.${alias}.description`),
      logo: `${alias}/logo-${alias}.svg`,
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
