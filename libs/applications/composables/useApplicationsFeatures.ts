import { APPLICATION_ALIAS } from '@lychen/applications-constants/ApplicationAlias';
import { type ApplicationFeatureList } from '@lychen/applications-model/ApplicationFeatureList';
import { useFeatures as useTeraFeatures } from '@lychen/tera-features/composables/useFeatures';
import { useFeatures as useKiroFeatures } from '@lychen/kiro-features/composables/useFeatures';
import { useFeatures as useMeliFeatures } from '@lychen/meli-features/composables/useFeatures';
import { useFeatures as useMykoFeatures } from '@lychen/myko-features/composables/useFeatures';
import { useFeatures as useVaraFeatures } from '@lychen/vue-vara/features/composables/useFeatures';
import { useFeatures as useNoviFeatures } from '@lychen/novi-features/composables/useFeatures';
import { useFeatures as useKoloFeatures } from '@lychen/kolo-features/composables/useFeatures';
import { useFeatures as useHumuFeatures } from '@lychen/humu-features/composables/useFeatures';
import { type UseGenericApplicationsFeatures } from '@lychen/applications-generic-composables/useGenericApplicationsFeatures';
import { type ApplicationFeatureAlias } from '@lychen/applications-model/ApplicationFeatureAlias';
import { type ApplicationFeatureGroup } from '@lychen/applications-model/ApplicationFeatureGroup';
import { type OrganizedFeaturesByGroup } from '@lychen/applications-model/OrganizedFeaturesByGroup';

export function useApplicationsFeatures() {
  const map: {
    [key: ApplicationFeatureAlias]: UseGenericApplicationsFeatures<ApplicationFeatureGroup>;
  } = {
    [APPLICATION_ALIAS.Tera]: useTeraFeatures(),
    [APPLICATION_ALIAS.Kiro]: useKiroFeatures(),
    [APPLICATION_ALIAS.Meli]: useMeliFeatures(),
    [APPLICATION_ALIAS.Myko]: useMykoFeatures(),
    [APPLICATION_ALIAS.Vara]: useVaraFeatures(),
    [APPLICATION_ALIAS.Novi]: useNoviFeatures(),
    [APPLICATION_ALIAS.Kolo]: useKoloFeatures(),
    [APPLICATION_ALIAS.Humu]: useHumuFeatures(),
  };

  function getFeatures(
    applicationAlias: keyof typeof map,
    group?: ApplicationFeatureGroup,
  ): ApplicationFeatureList {
    return getApplicationComposable(applicationAlias).getList(group);
  }

  function getFeaturesOrganizedByGroup(
    applicationAlias: keyof typeof map,
  ): OrganizedFeaturesByGroup {
    return getApplicationComposable(applicationAlias).getOrganizedFeatures();
  }

  function getApplicationComposable(
    applicationAlias: keyof typeof map,
  ): UseGenericApplicationsFeatures<ApplicationFeatureGroup> | never {
    try {
      return map[applicationAlias];
    } catch (e) {
      if (e instanceof TypeError) {
        throw new Error(`'${applicationAlias}' is not defined in the features map`);
      }
      throw e;
    }
  }

  return {
    getFeatures,
    getFeaturesOrganizedByGroup,
  };
}
