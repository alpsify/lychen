<template>
  <CardPersonaWrapper
    :persona-id="id"
    :html-id="htmlId"
    title="Design"
  >
    <div
      :id="htmlId"
      class="flex flex-col bg-surface-container-low rounded-2xl group relative max-w-[300px] justify-end items-stretch"
    >
      <img
        :src="`/persona/${id}.webp`"
        class="h-full aspect-2/3 object-cover rounded-2xl"
      />

      <div
        class="flex flex-col gap-2 items-stretch absolute p-4 bg-surface/90 rounded-xl bottom-2 left-2 right-2"
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
  </CardPersonaWrapper>
</template>

<script setup lang="ts">
import { type Props } from '.';
import BaseHeading from '@lychen/vue-ui-components-app/base-heading/BaseHeading.vue';
import { Badge } from '@lychen/vue-ui-components-core/badge';
import { useId } from 'vue';
import CardPersonaWrapper from './CardPersonaWrapper.vue';

const { id } = defineProps<Props>();

const htmlId = useId();
</script>

<style lang="css" scoped>
h5 {
  opacity: 0.6;
}
</style>
