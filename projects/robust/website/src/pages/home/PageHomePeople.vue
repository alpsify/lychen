<template>
  <LychenContainer class="flex xl:flex-row flex-col justify-start xl:items-center gap-8 relative">
    <div
      class="bg-tertiary-container text-on-tertiary-container rounded-3xl xl:w-1/2 p-8 flex flex-col gap-6"
    >
      <LychenTitle
        variant="h2"
        class="md:w-1/2"
        >{{ t('people.title') }}</LychenTitle
      >
      <LychenParagraph
        variant="website-highlight"
        class="md:w-1/2"
        >{{ t('people.description') }}</LychenParagraph
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
  </LychenContainer>
</template>

<script setup lang="ts">
import CitizenImageUrl from './assets/Citizen.webp';
import CityImageUrl from './assets/City.webp';
import CompanyImageUrl from './assets/Company.webp';
import AssociationImageUrl from './assets/Association.webp';
import { messages, TRANSLATION_KEY } from './i18n';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import CardActor from '@/components/CardActor.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
