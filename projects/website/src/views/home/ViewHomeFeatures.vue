<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('features.title') }}</LychenTitle>
    <LychenParagraph
      variant="website-default"
      class="lg:w-1/2 lg:text-center"
      >{{ t('features.description') }}
    </LychenParagraph>
    <LychenBentoGrid
      class="mt-10 grid w-full auto-rows-[20rem] grid-cols-3 gap-4 lg:auto-rows-[minmax(20rem,30rem)] lg:grid-rows-3"
    >
      <LychenBentoGridCard
        v-for="(feature, index) in features"
        :key="index"
        v-bind="feature"
        :class="feature.class"
      />
    </LychenBentoGrid>
  </LychenContainer>
</template>

<script setup lang="ts">
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenBentoGrid = defineAsyncComponent(
  () => import('@lychen/ui-components/bento-grid/LychenBentoGrid.vue'),
);
const LychenBentoGridCard = defineAsyncComponent(
  () => import('@lychen/ui-components/bento-grid/LychenBentoGridCard.vue'),
);

const { t } = useTranslations();

const features = [
  {
    title: 'Consommation alimentaire',
    description: 'Gèrer et optimiser la consommation de produits locaux.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:row-start-1 lg:row-end-4 lg:col-start-2 lg:col-end-3',
  },
  {
    title: 'Production alimentaire',
    description: 'Suivre et analyser la production agricole et son impact.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/6631952/pexels-photo-6631952.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-1 lg:col-end-2 lg:row-start-1 lg:row-end-3',
  },
  {
    title: 'Environnement',
    description: "Comprendre, préserver l'environnement",
    routeName: '',
    image:
      'https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-1 lg:col-end-2 lg:row-start-3 lg:row-end-4',
  },
  {
    title: 'Valorisation des déchets organiques',
    description: 'Organiser et valoriser les déchets pour un impact positif.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/7728736/pexels-photo-7728736.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-3 lg:col-end-3 lg:row-start-1 lg:row-end-2',
  },
  {
    title: 'Activité du territoire',
    description: 'Promouvoir et organiser les projets projets locaux.',
    routeName: '',
    image:
      'https://images.pexels.com/photos/4880395/pexels-photo-4880395.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    cta: 'En savoir plus',
    class: 'lg:col-start-3 lg:col-end-3 lg:row-start-2 lg:row-end-4',
  },
];
</script>
