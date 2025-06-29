import { messages, TRANSLATION_KEY } from '../i18n';
import { type SustainableDevelopmentGoal } from '../model/SustainableDevelopmentGoal';
import { type Ref, ref } from 'vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

export function useSustainableDevelopmentGoals() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

  const totalNumber = 17;

  function constructSustainableDevelopmentGoalObject(
    index: number,
  ): Ref<SustainableDevelopmentGoal> {
    return ref({
      index: index,
      title: t(`goal.${index}.title`),
      description: t(`goal.${index}.description`),
      link: t(`goal.${index}.link.href`),
      icon: `${t(`icon_folder`)}/${index}.png`,
    });
  }

  const two = constructSustainableDevelopmentGoalObject(2);
  const eleven = constructSustainableDevelopmentGoalObject(11);
  const twelve = constructSustainableDevelopmentGoalObject(12);

  return {
    totalNumber: totalNumber,
    two,
    eleven,
    twelve,
  };
}
