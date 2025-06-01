import { useHead, useSeoMeta } from '@unhead/vue';
import { useRoute, useRouter } from 'vue-router';

export function useExtendedHead(
  t: (key: string) => string,
  options?: { ogImage?: string; canonical?: string },
) {
  const router = useRouter();
  const route = useRoute();

  useHead({
    link: [
      {
        rel: 'canonical',
        href:
          options?.canonical ??
          `https://${import.meta.env.VITE_UNHEAD_HOST}${router.resolve(route.name ? { name: route.name } : route).path}`,
      },
    ],
  });

  useSeoMeta({
    title: t('meta.title'),
    description: t('meta.description'),
    ogDescription: t('meta.description'),
    ogTitle: t('meta.title'),
    ogImage: options?.ogImage,
    twitterCard: 'summary_large_image',
    twitterTitle: t('meta.title'),
    twitterDescription: t('meta.description'),
  });
}
