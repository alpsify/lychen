<template>
  <CardPersonaWrapper
    :persona-id="id"
    :html-id="htmlId"
    title="Small"
  >
    <div
      :id="htmlId"
      class="flex flex-row gap-4 bg-surface-container-low rounded-xl items-center max-h-20 p-4"
    >
      <div class="rounded-2xl">
        <img
          :src="`/persona/${id}.webp`"
          class="h-14 aspect-1/1 object-cover object-top rounded-2xl"
        />
      </div>
      <div class="flex flex-col gap-1 items-stretch grow">
        <div class="flex flex-row gap-2 justify-between">
          <BaseHeading variant="h2">{{ fullName }}</BaseHeading>
        </div>
        <Badge class="bg-tertiary-container text-on-tertiary-container self-start">{{ id }}</Badge>
      </div>
    </div>
  </CardPersonaWrapper>
</template>

<script setup lang="ts">
import { type Props } from '.';
import BaseHeading from '@lychen/vue-components-app/base-heading/BaseHeading.vue';
import { Badge } from '@lychen/vue-components-core/badge';
import { useId } from 'vue';
import CardPersonaWrapper from './CardPersonaWrapper.vue';

const { id } = defineProps<Props>();

const htmlId = useId();
</script>
