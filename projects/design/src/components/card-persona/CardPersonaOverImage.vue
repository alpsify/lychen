<template>
  <div
    ref="cardPersona"
    class="flex flex-col bg-surface-container-low rounded-2xl group relative max-w-[300px] justify-end"
  >
    <img
      :src="`/persona/${id}.webp`"
      class="h-full aspect-2/3 object-cover rounded-2xl"
    />
    <Tooltip>
      <TooltipTrigger as-child>
        <Button
          class="exclude-from-download hidden group-hover:flex absolute top-5 left-5"
          :icon="faDownload"
          size="xs"
          @click="downloadCard"
        />
      </TooltipTrigger>
      <TooltipContent> Télécharger l'image </TooltipContent>
    </Tooltip>
    <div
      class="flex flex-col gap-2 items-stretch absolute p-4 bg-surface/60 backdrop-blur-lg m-2 rounded-xl"
    >
      <div class="flex flex-row justify-between items-center">
        <BaseHeading variant="h2">{{ fullName }}</BaseHeading>
        <div class="flex flex-row gap-2">
          <Badge class="bg-tertiary-container text-on-tertiary-container">{{ id }}</Badge>
        </div>
      </div>

      <div class="flex flex-col gap-2 basis-1/2">
        <ul class="list-disc pl-4">
          <li
            v-for="(goal, index) in goals"
            :key="index"
            class="text-sm"
          >
            {{ goal }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { VARIANT, type Props } from '.';
import BaseHeading from '@lychen/vue-ui-components-app/base-heading/BaseHeading.vue';
import { Badge } from '@lychen/vue-ui-components-core/badge';
import { toPng } from 'html-to-image';
import { useTemplateRef } from 'vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { faDownload } from '@fortawesome/pro-light-svg-icons/faDownload';
import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-ui-components-core/tooltip';

const { id, variant = VARIANT.Default } = defineProps<Props>();

const cardPersona = useTemplateRef('cardPersona');

function filter(node: HTMLElement) {
  // Exclude the button itself from the generated image
  return !node.classList?.contains('exclude-from-download');
}

async function downloadCard() {
  if (!cardPersona.value) {
    return;
  }

  toPng(cardPersona.value, { cacheBust: true, filter })
    .then(function (dataUrl) {
      const link = document.createElement('a');
      link.download = `${id}.png`;
      link.href = dataUrl;
      link.click();
    })
    .catch(function (error) {});
}
</script>

<style lang="css" scoped>
h5 {
  opacity: 0.6;
}
</style>
