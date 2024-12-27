import { SOCIAL_LINK } from '@lychen/util-constants/Social';
import { messages, TRANSLATION_KEY } from '../i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { LINK } from '@lychen/util-constants/Link';

export function useCommunityMenu() {
  const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

  const communityMenuList = [
    {
      title: t(`navigation.community.github.title`),
      description: t(`navigation.community.github.description`),
      link: SOCIAL_LINK.GitHub,
    },
    {
      title: t(`navigation.community.discord.title`),
      description: t(`navigation.community.discord.description`),
      link: SOCIAL_LINK.Discord,
    },
    {
      title: t(`navigation.community.forum.title`),
      description: t(`navigation.community.forum.description`),
      link: LINK.Forum,
    },
  ];

  return {
    communityMenuList,
  };
}
