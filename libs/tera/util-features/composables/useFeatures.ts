import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { TRANSLATION_KEY, messages } from '../i18n';
import { ApplicationFeature } from '@lychen/applications-util-model/ApplicationFeature';
import { ApplicationFeatureListItem } from '@lychen/applications-util-model/ApplicationFeatureList';

export function useFeatures() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

  function generateFeature(item: ApplicationFeatureListItem): ApplicationFeature {
    return {
      alias: item.alias,
      title: t(`${item.alias}.title`),
      description: t(`${item.alias}.description`),
      group: item.group,
    };
  }
}
