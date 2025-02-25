<template>
  <LychenContainer class="flex xl:flex-row flex-col justify-start xl:items-center gap-8 relative">
    <div
      class="bg-tertiary-container text-on-tertiary-container rounded-3xl xl:w-1/2 p-8 flex flex-col gap-6"
    >
      <LychenTitle
        variant="h2"
        class="md:w-1/2"
        >Pour tout le monde.</LychenTitle
      >
      <LychenParagraph
        variant="website-highlight"
        class="md:w-1/2"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt mauris,
        a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
        euismod.</LychenParagraph
      >
    </div>
    <div
      class="xl:absolute flex flex-col md:grid md:grid-cols-2 grid-rows-2 gap-8 xl:w-2/3 xl:left-1/3"
    >
      <CardActor
        :background-image="CitizenImageUrl"
        title="Citoyen·nes"
      />
      <CardActor
        :background-image="AssociationImageUrl"
        title="Associations"
      />
      <CardActor
        :background-image="CompanyImageUrl"
        title="Entreprises"
      />
      <CardActor
        :background-image="CityImageUrl"
        title="Collectivités"
      />
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import CitizenImageUrl from './assets/Citizen.jpg';
import CityImageUrl from './assets/City.png';
import CompanyImageUrl from './assets/Company.jpg';
import AssociationImageUrl from './assets/Association.jpg';
import { messages, TRANSLATION_KEY } from './i18n';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import CardActor from '@/components/CardActor.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
