<template>
  <LychenContainer class="flex flex-col gap-10">
    <div class="flex flex-col lg:flex-row items-center gap-4 justify-between lg:justify-center">
      <LychenTitle
        variant="h2"
        class="basis-2/3">
        Fait pour ceux qui veulent du changements
      </LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="basis-1/3">
        Notre plateforme facilite la mise en relation de tous les acteurs du secteur agricole et environnemental. Que
        vous soyez agriculteur, jardinier amateur, chercheur, ou membre d'une association, nous vous offrons un espace
        de collaboration et de partage.
      </LychenParagraph>
    </div>
    <div class="flex flex-col lg:grid lg:grid-cols-3 gap-4">
      <LychenCard
        v-for="(actor, index) in actors"
        :key="index"
        class="justify-end items-stretch">
        <Routerlink :to="{ name: RouteViewPrice.name }">
          <div class="p-4 bg-center bg-no-repeat rounded-lg flex flex-col items-start pb-0 gap-2">
            <img
              src="https://images.pexels.com/photos/2280568/pexels-photo-2280568.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
              class="rounded-lg"/>
            <LychenTitle variant="h6">{{ actor.title }}</LychenTitle>
          </div>
          <div class="opacity-70 p-4">{{ actor.text }}</div>
        </Routerlink>
      </LychenCard>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import {defineAsyncComponent} from 'vue';

import {RouteViewPrice} from '../price';
import {actors} from '.';
import {useTranslations} from './i18n';

const LychenTitle = defineAsyncComponent(() => import('@lychen/ui-components/title/LychenTitle.vue'));
const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenCard = defineAsyncComponent(() => import('@lychen/ui-components/card/LychenCard.vue'));
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const {t} = useTranslations();
</script>
