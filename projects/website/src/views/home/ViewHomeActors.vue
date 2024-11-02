<template>
  <LychenContainer class="flex flex-col gap-10">
    <div class="flex flex-col items-center justify-between gap-4 lg:flex-row lg:justify-center">
      <LychenTitle
        variant="h2"
        class="basis-2/3"
      >
        Fait pour ceux qui veulent du changements
      </LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="basis-1/3"
      >
        Notre plateforme facilite la mise en relation de tous les acteurs du secteur agricole et
        environnemental. Que vous soyez agriculteur, jardinier amateur, chercheur, ou membre d'une
        association, nous vous offrons un espace de collaboration et de partage.
      </LychenParagraph>
    </div>
    <div class="flex flex-col gap-4 lg:grid lg:grid-cols-3">
      <LychenCard
        v-for="(actor, index) in actors"
        :key="index"
        class="flex flex-col items-stretch justify-start p-4"
      >
        <LychenTitle variant="h6">{{ actor.title }}</LychenTitle>
        <div class="opacity-70">{{ actor.text }}</div>
      </LychenCard>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { actors } from '.';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenCard = defineAsyncComponent(() => import('@lychen/ui-components/card/LychenCard.vue'));
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
</script>
