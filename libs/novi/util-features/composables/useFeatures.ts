import { FEATURE_ALIAS, FEATURE_GROUP, FEATURES_LIST } from '@lychen/novi-util-constants/Feature';
import {
  useGenericApplicationsFeatures,
  UseGenericApplicationsFeatures,
} from '@lychen/applications-util-generic-composables/useGenericApplicationsFeatures';
import { TRANSLATION_KEY, messages } from '../i18n';
import { FeatureAlias, FeatureGroup } from '../model/Feature';

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
