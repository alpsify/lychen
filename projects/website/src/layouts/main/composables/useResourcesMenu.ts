import { RoutePageManifest } from '@pages/manifest';
import { messages, TRANSLATION_KEY } from '../i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

export function useResourcesMenu() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

  const resourcesMenuList = [
    {
      title: t(`navigation.resources.blog.title`),
      description: t(`navigation.resources.blog.description`),
      link: 'https://blog.lychen.fr',
    },
    {
      title: t(`navigation.resources.project_dashboard.title`),
      description: t(`navigation.resources.project_dashboard.description`),
      link: 'https://huly.app/workbench/lychen',
    },
    {
      title: t(`navigation.resources.manifest.title`),
      description: t(`navigation.resources.manifest.description`),
      route: RoutePageManifest,
    },
    /*{
        title: t(`navigation.resources.feedback.title`),
        description: t(`navigation.resources.feedback.description`),
        link: '',
      },
      {
        title: t(`navigation.resources.roadmap.title`),
        description: t(`navigation.resources.roadmap.description`),
        link: '',
      },
      {
        title: t(`navigation.resources.docs.title`),
        description: t(`navigation.resources.docs.description`),
        link: '',
      },*/
  ];

  return {
    resourcesMenuList,
  };
}
