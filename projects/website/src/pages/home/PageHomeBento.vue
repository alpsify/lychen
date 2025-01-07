<template>
  <LychenContainer class="flex flex-col items-center">
    <div class="bento-grid self-stretch mt-8">
      <div class="item justify-center">
        <LychenIcon
          icon="chart-network"
          class="text-5xl"
        />
        <p class="text-xl">Intégrabilité</p>
      </div>
      <div class="item justify-between">
        Objectif
        <p class="gradient text-5xl">2026</p>
        v1
      </div>
      <div class="item justify-between">
        <p>Valorisé le</p>
        <p class="text-4xl gradient">local</p>
        <p>via le numérique</p>
      </div>
      <div class="item justify-center">
        <p class="gradient text-xl md:text-2xl">Vous êtes propriétaire de vos données</p>
      </div>
      <div class="item justify-center">
        <p class="gradient text-4xl">Accessibilité</p>
        <p>Fluidité et modernité</p>
      </div>
      <div class="item justify-center">
        <p class="text-xl gradient md:text-2xl">Changements citoyens</p>
      </div>
      <div class="item bg-surface-container-high">
        <img
          :src="bentoCentralImageUrl"
          class="rounded-xl w-2/3"
          alt="number 10 as organic blue and green shapes"
        />
        <p class="text-4xl gradient">Applications</p>
        <p>Inter-connectées</p>
      </div>
      <div class="item justify-between">
        Basé sur les <br />
        <p class="gradient text-8xl">17</p>
        ODD européens
      </div>
      <div class="item justify-between">
        <div></div>
        <div>
          <LychenIcon
            icon="hand-holding-heart"
            class="text-5xl"
          />
          <p class="text-2xl md:text-4xl gradient">Sponsor</p>
        </div>
        plûtot qu'investisseur
      </div>
      <div class="item justify-center">
        <p class="text-2xl gradient">Ethique & inclusif</p>
      </div>
      <div class="item justify-center">
        <p class="gradient text-5xl">0</p>
        compromis
      </div>
      <div class="item justify-center">
        <p class="text-xl gradient md:text-2xl">Faire communiquer les acteurs du territoire</p>
      </div>
      <div class="item justify-center"><p class="text-2xl">Petite équipe, grand résultat</p></div>
      <div class="item justify-center">
        Transparence
        <p class="gradient text-2xl">Open-Source Software</p>
      </div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import bentoCentralImageUrl from './assets/bento-central.webp';
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style style="css" scoped>
.bento-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-template-rows: repeat(6, auto);
  gap: theme('gap.4');
  grid-template-areas:
    'one two three four four five five'
    'six six seven seven seven eight nine'
    'six six seven seven seven eight nine'
    'ten eleven seven seven seven eight nine'
    'ten eleven seven seven seven twelve twelve'
    'thirteen thirteen fourteen fourteen fourteen twelve twelve';

  @media not all and (min-width: 1024px) {
    & {
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: auto;
      grid-template-areas:
        'seven seven seven one'
        'seven seven seven two'
        'three four five five'
        'six eight nine ten'
        'six eight nine eleven'
        'twelve twelve thirteen thirteen'
        'fourteen fourteen fourteen fourteen';
    }
  }

  @media not all and (min-width: 640px) {
    & {
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: auto;
      grid-template-areas:
        'seven seven'
        'one two'
        'three two'
        'three four'
        'three four'
        'five five'
        'eight six'
        'eight nine'
        'ten nine'
        'ten eleven'
        'twelve thirteen'
        'fourteen fourteen';
    }
  }

  .item {
    display: flex;
    flex-flow: column;
    align-items: center;
    padding: theme('padding.6') theme('padding.4');
    border-radius: theme('borderRadius.3xl');
    background: theme('colors.surface.container');
    font-weight: theme('fontWeight.bold');
    text-align: center;
    gap: theme('gap.4');

    p.gradient {
      background: var(--linear-gradient-primary-to-tertiary);
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    &:nth-child(1) {
      grid-area: one;
    }

    &:nth-child(2) {
      grid-area: two;
    }

    &:nth-child(3) {
      grid-area: three;
    }

    &:nth-child(4) {
      grid-area: four;
    }

    &:nth-child(5) {
      grid-area: five;
    }

    &:nth-child(6) {
      grid-area: six;
    }
    &:nth-child(7) {
      grid-area: seven;
    }
    &:nth-child(8) {
      grid-area: eight;
    }
    &:nth-child(9) {
      grid-area: nine;
    }
    &:nth-child(10) {
      grid-area: ten;
    }
    &:nth-child(11) {
      grid-area: eleven;
    }
    &:nth-child(12) {
      grid-area: twelve;
    }
    &:nth-child(13) {
      grid-area: thirteen;
    }
    &:nth-child(14) {
      grid-area: fourteen;
    }
  }
}
</style>
