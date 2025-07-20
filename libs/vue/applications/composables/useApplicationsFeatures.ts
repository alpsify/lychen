import { useFeatures as useTeraFeatures } from '@lychen/vue-tera/composables/use-features/useFeatures';
import { useFeatures as useKiroFeatures } from '@lychen/vue-kiro/composables/use-features/useFeatures';
import { useFeatures as useMeliFeatures } from '@lychen/vue-meli/composables/use-features/useFeatures';
import { useFeatures as useMykoFeatures } from '@lychen/vue-myko/composables/use-features/useFeatures';
import { useFeatures as useVaraFeatures } from '@lychen/vue-vara/composables/use-features/useFeatures';
import { useFeatures as useNoviFeatures } from '@lychen/vue-novi/composables/use-features/useFeatures';
import { useFeatures as useKoloFeatures } from '@lychen/vue-kolo/composables/use-features/useFeatures';
import { useFeatures as useHumuFeatures } from '@lychen/vue-humu/composables/use-features/useFeatures';
import { type UseGenericApplicationsFeatures } from '@lychen/vue-composables/useGenericApplicationsFeatures';
import { APPLICATION_ALIAS } from '@lychen/typescript-applications/constants/ApplicationAlias';
import { type ApplicationFeatureList } from '@lychen/typescript-applications/model/ApplicationFeatureList';
import { type ApplicationFeatureAlias } from '@lychen/typescript-applications/model/ApplicationFeatureAlias';
import { type ApplicationFeatureGroup } from '@lychen/typescript-applications/model/ApplicationFeatureGroup';
import { type OrganizedFeaturesByGroup } from '@lychen/typescript-applications/model/OrganizedFeaturesByGroup';

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
