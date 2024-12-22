import { messages, TRANSLATION_KEY } from '../i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

export function useCommunityMenu() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

  const communityMenuList = [
    {
      title: t(`navigation.community.github.title`),
      description: t(`navigation.community.github.description`),
      link: 'https://github.com/alpsify/lychen',
    },
    {
      title: t(`navigation.community.discord.title`),
      description: t(`navigation.community.discord.description`),
      link: 'https://discord.gg/FSMbXt5gr4',
    },
    {
      title: t(`navigation.community.forum.title`),
      description: t(`navigation.community.forum.description`),
      link: 'https://github.com/alpsify/lychen/discussions',
    },
  ];

  return {
    communityMenuList,
  };
}
