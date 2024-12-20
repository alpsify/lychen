import { useTranslations } from '@lychen/odd-ui-i18n';
import { Odd } from '@lychen/odd-util-model/Odd';
import { type Ref, ref } from 'vue';

export function useOddCatalog() {
  const { t } = useTranslations();

  const totalNumber = 17;

  function constructOddObject(index: number): Ref<Odd> {
    return ref({
      index: index,
      title: t(`goal.${index}.title`),
      description: t(`goal.${index}.description`),
      link: t(`goal.${index}.link.href`),
      icon: `${t(`icon_folder`)}/${index}.png`,
    });
  }

  const two = constructOddObject(2);
  const eleven = constructOddObject(11);
  const twelve = constructOddObject(12);

  return {
    totalNumber: totalNumber,
    two,
    eleven,
    twelve,
  };
}
