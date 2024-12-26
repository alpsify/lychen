import { ApplicationFeature } from '@lychen/applications-util-model/ApplicationFeature';
import { ApplicationFeatureAlias } from '@lychen/applications-util-model/ApplicationFeatureAlias';
import { ApplicationFeatureGroup } from '@lychen/applications-util-model/ApplicationFeatureGroup';
import {
  ApplicationFeatureList,
  ApplicationFeatureListItem,
} from '@lychen/applications-util-model/ApplicationFeatureList';
import {
  UseCustomI18nOptions,
  useI18nExtended,
} from '@lychen/vue-i18n-util-composables/useI18nExtended';

export interface UseGenericApplicationsFeatures<
  G extends ApplicationFeatureGroup = ApplicationFeatureGroup,
> {
  t: (key: string) => string;
  getList: (group?: G) => ApplicationFeature[];
  getOrganizedFeatures(): OrganizedFeaturesByGroup;
}

export type OrganizedFeaturesByGroup = Record<
  ApplicationFeatureGroup,
  { title: string; features: ApplicationFeature[] }
>;

export function useGenericApplicationsFeatures<
  A extends ApplicationFeatureAlias = ApplicationFeatureAlias,
  G extends ApplicationFeatureGroup = ApplicationFeatureGroup,
>(
  aliasConst: { [key: string]: A },
  groupConst: { [key: string]: G },
  listConst: ApplicationFeatureList<A, G>,
  i18nOptions: UseCustomI18nOptions,
): UseGenericApplicationsFeatures<G> {
  const { t } = useI18nExtended({
    messages: i18nOptions.messages,
    rootKey: i18nOptions.rootKey,
    prefixed: true,
  });

  function getList(group?: G) {
    const innerList: ApplicationFeature[] = [];
    listConst.forEach((item) => {
      if (group && item.group !== group) {
        return;
      }
      innerList.push(generateFeature(item));
    });
    return innerList;
  }

  function generateFeature(item: ApplicationFeatureListItem<A, G>): ApplicationFeature {
    const translationPrefix = `${item.group}.feature.${item.alias}`;
    return {
      alias: item.alias,
      title: t(`${translationPrefix}.title`),
      description: t(`${translationPrefix}.description`),
      group: item.group,
    };
  }

  function getOrganizedFeatures(): OrganizedFeaturesByGroup {
    return listConst.reduce((acc, feature) => {
      const { group, alias } = feature;
      if (!acc[group]) {
        acc[group] = {
          title: t(`${group}.title`),
          features: [],
        };
      }
      acc[group].features.push(generateFeature(feature));
      return acc;
    }, {} as OrganizedFeaturesByGroup);
  }

  return {
    getList,
    getOrganizedFeatures,
    t,
  };
}
