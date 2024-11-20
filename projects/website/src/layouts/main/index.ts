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

export function useResourcesMenu() {
  const { t } = useTranslations();

  const resourcesMenuList = [
    {
      title: t(`${TRANSLATION_KEY}.navigation.resources.blog.title`),
      description: t(`${TRANSLATION_KEY}.navigation.resources.blog.description`),
      link: 'https://blog.lychen.fr',
    },
    {
      title: t(`${TRANSLATION_KEY}.navigation.resources.project_dashboard.title`),
      description: t(`${TRANSLATION_KEY}.navigation.resources.project_dashboard.description`),
      link: 'https://huly.app/workbench/lychen',
    },
    /*{
      title: t(`${TRANSLATION_KEY}.navigation.resources.feedback.title`),
      description: t(`${TRANSLATION_KEY}.navigation.resources.feedback.description`),
      link: '',
    },
    {
      title: t(`${TRANSLATION_KEY}.navigation.resources.roadmap.title`),
      description: t(`${TRANSLATION_KEY}.navigation.resources.roadmap.description`),
      link: '',
    },
    {
      title: t(`${TRANSLATION_KEY}.navigation.resources.docs.title`),
      description: t(`${TRANSLATION_KEY}.navigation.resources.docs.description`),
      link: '',
    },*/
  ];

  return {
    resourcesMenuList,
  };
}
