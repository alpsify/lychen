<template>
  <div
    ref="cardPersona"
    class="flex flex-row gap-4 bg-surface-container-low rounded-xl group items-center max-h-20 p-4"
  >
    <div class="rounded-2xl">
      <img
        :src="`/persona/${id}.webp`"
        class="h-14 aspect-1/1 object-cover object-top rounded-2xl"
      />
    </div>
    <div class="flex flex-col gap-1 items-start">
      <BaseHeading variant="h2">{{ fullName }}</BaseHeading>
      <div class="flex flex-row gap-2">
        <Badge class="bg-tertiary-container text-on-tertiary-container">{{ id }}</Badge>
        <Tooltip>
          <TooltipTrigger as-child>
            <Button
              class="exclude-from-download hidden group-hover:flex"
              :icon="faDownload"
              size="xs"
              @click="downloadCard"
            />
          </TooltipTrigger>
          <TooltipContent> Télécharger l'image </TooltipContent>
        </Tooltip>
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
