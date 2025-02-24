<template>
  <LychenContainer
    wrapper-class="bg-gradient-to-b from-surface-container to-surface"
    class="flex flex-col items-center"
  >
    <div class="md:w-2/3 text-center flex flex-col gap-6">
      <LychenTitle variant="h2">S'engager et inspirer localement.</LychenTitle>
      <LychenParagraph variant="website-highlight"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt mauris,
        a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
        euismod.</LychenParagraph
      >
      <div class="flex md:flex-row gap-8 flex-col">
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-gradient-to-tr from-primary to-primary/60 shadow-2xl shadow-primary/50 dark:shadow-primary-container/50 text-on-primary outline-1 outline-offset-4 outline-primary-container/90 flex flex-col items-center justify-center gap-4"
        >
          <LychenTitle variant="h4">Votre ecosystème</LychenTitle>
          <p>
            La où vous vivez et la où votre impact est très important. Améliorer votre espace de
            vie, tout le monde en bénéficiera.
          </p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center gap-4"
        >
          <LychenTitle variant="h4">Vos connections</LychenTitle>
          <p>
            Connecte toi directement avec tes partenaires, acteurs, voisins et entreprises locales.
            Plus d'intermédiaire.
          </p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center gap-4"
        >
          <LychenTitle variant="h4">Vos engagements</LychenTitle>
          <p>
            Choisi et construit tes engagements pour chaque cause et partenaire. Plus besoin de
            faire comme tout le monde.
          </p>
        </div>
      </div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
