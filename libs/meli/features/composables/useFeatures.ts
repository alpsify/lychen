import { FEATURE_ALIAS, FEATURE_GROUP, FEATURES_LIST } from '@lychen/meli-constants/Feature';
import {
  useGenericApplicationsFeatures,
  type UseGenericApplicationsFeatures,
} from '@lychen/applications-generic-composables/useGenericApplicationsFeatures';
import { TRANSLATION_KEY, messages } from '../i18n';
import { type FeatureAlias, type FeatureGroup } from '../model/Feature';

export function useFeatures(): UseGenericApplicationsFeatures<FeatureGroup> {
  return useGenericApplicationsFeatures<FeatureAlias, FeatureGroup>(
    FEATURE_ALIAS,
    FEATURE_GROUP,
    FEATURES_LIST,
    {
      messages,
      rootKey: TRANSLATION_KEY,
    },
  );
}
