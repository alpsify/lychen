import { APPLICATION_ALIAS } from '@lychen/applications-util-constants/ApplicationAlias';
import { ApplicationFeatureList } from '@lychen/applications-util-model/ApplicationFeatureList';
import { useFeatures as useTeraFeatures } from '@lychen/tera-util-features/composables/useFeatures';
import { useFeatures as useKiroFeatures } from '@lychen/kiro-util-features/composables/useFeatures';
import { useFeatures as useMeliFeatures } from '@lychen/meli-util-features/composables/useFeatures';
import { useFeatures as useMykoFeatures } from '@lychen/myko-util-features/composables/useFeatures';
import { useFeatures as useVaraFeatures } from '@lychen/vara-util-features/composables/useFeatures';
import {
  OrganizedFeaturesByGroup,
  UseGenericApplicationsFeatures,
} from '@lychen/applications-util-generic-composables/useGenericApplicationsFeatures';
import { ApplicationFeatureAlias } from '@lychen/applications-util-model/ApplicationFeatureAlias';
import { ApplicationFeatureGroup } from '@lychen/applications-util-model/ApplicationFeatureGroup';

export function useApplicationsFeatures() {
  const map: {
    [key: ApplicationFeatureAlias]: UseGenericApplicationsFeatures<ApplicationFeatureGroup>;
  } = {
    [APPLICATION_ALIAS.Tera]: useTeraFeatures(),
    [APPLICATION_ALIAS.Kiro]: useKiroFeatures(),
    [APPLICATION_ALIAS.Meli]: useMeliFeatures(),
    [APPLICATION_ALIAS.Myko]: useMykoFeatures(),
    [APPLICATION_ALIAS.Vara]: useVaraFeatures(),
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
