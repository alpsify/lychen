import {
  FEATURE_ALIAS,
  FEATURE_GROUP,
  FEATURES_LIST,
  type FeatureAlias,
  type FeatureGroup,
} from '@lychen/typescript-novi/constants/Feature';
import {
  useGenericApplicationsFeatures,
  type UseGenericApplicationsFeatures,
} from '@lychen/vue-composables/useGenericApplicationsFeatures';
import { TRANSLATION_KEY, messages } from './i18n';

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
