<template>
  <Container class="flex xl:flex-row flex-col justify-start xl:items-center gap-8 relative">
    <div
      class="bg-tertiary-container text-on-tertiary-container rounded-3xl xl:w-1/2 p-8 flex flex-col gap-6"
    >
      <Title
        variant="h2"
        class="md:w-1/2"
        >{{ t('people.title') }}</Title
      >
      <Paragraph
        variant="website-highlight"
        class="md:w-1/2"
        >{{ t('people.description') }}</Paragraph
      >
    </div>
    <div
      class="xl:absolute flex flex-col md:grid md:grid-cols-2 grid-rows-2 gap-8 xl:w-2/3 xl:left-1/3"
    >
      <CardActor
        :background-image="CitizenImageUrl"
        :title="t('people.citizen')"
      />
      <CardActor
        :background-image="AssociationImageUrl"
        :title="t('people.associations')"
      />
      <CardActor
        :background-image="CompanyImageUrl"
        :title="t('people.companies')"
      />
      <CardActor
        :background-image="CityImageUrl"
        :title="t('people.cities')"
      />
    </div>
  </Container>
</template>

<script setup lang="ts">
import CitizenImageUrl from './assets/Citizen.webp';
import CityImageUrl from './assets/City.webp';
import CompanyImageUrl from './assets/Company.webp';
import AssociationImageUrl from './assets/Association.webp';
import { messages, TRANSLATION_KEY } from './i18n';
import Container from '@lychen/vue-components-website/container/Container.vue';
import Title from '@lychen/vue-components-website/title/Title.vue';
import Paragraph from '@lychen/vue-components-website/paragraph/Paragraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import CardActor from '@/components/CardActor.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
