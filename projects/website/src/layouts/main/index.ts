import { TRANSLATION_KEY, useTranslations } from './i18n';

export function useCommunityMenu() {
  const { t } = useTranslations();

  const communityMenuList = [
    {
      title: t(`${TRANSLATION_KEY}.navigation.community.github.title`),
      description: t(`${TRANSLATION_KEY}.navigation.community.github.description`),
      link: 'https://github.com/alpsify/lychen',
    },
    {
      title: t(`${TRANSLATION_KEY}.navigation.community.discord.title`),
      description: t(`${TRANSLATION_KEY}.navigation.community.discord.description`),
      link: 'https://discord.gg/FSMbXt5gr4',
    },
    {
      title: t(`${TRANSLATION_KEY}.navigation.community.forum.title`),
      description: t(`${TRANSLATION_KEY}.navigation.community.forum.description`),
      link: 'https://github.com/alpsify/lychen/discussions',
    },
  ];

  return {
    communityMenuList,
  };
}
