<template>
  <CardPersonaWrapper
    :persona-id="id"
    :html-id="htmlId"
    title="Detailed"
  >
    <div
      :id="htmlId"
      class="flex flex-row gap-10 bg-surface-container-low rounded-xl p-8 group"
    >
      <div class="rounded-2xl basis-1/3 relative">
        <img
          :src="`/persona/${id}.webp`"
          class="h-full aspect-2/3 object-cover rounded-2xl"
        />
      </div>
      <div class="flex flex-col gap-8 items-stretch basis-2/3">
        <div class="flex flex-row justify-between items-center">
          <BaseHeading>{{ fullName }}</BaseHeading>
          <div class="flex flex-row gap-2">
            <Badge class="bg-tertiary-container text-on-tertiary-container">{{ id }}</Badge>
          </div>
        </div>

        <div class="flex flex-row gap-4">
          <div class="flex flex-col basis-1/2 gap-2">
            <BaseHeading
              variant="h5"
              class="inline"
              >Métier</BaseHeading
            >
            <p>{{ jobTitle }}</p>
          </div>
          <div class="flex flex-col basis-1/2 gap-2">
            <p>
              <BaseHeading
                variant="h5"
                class="inline"
                >Age</BaseHeading
              >
              {{ age }}
            </p>
            <p>
              <BaseHeading
                variant="h5"
                class="inline"
                >Localisation</BaseHeading
              >
              {{ location }}
            </p>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <BaseHeading variant="h5">Biography</BaseHeading>
          <p>{{ biography }}</p>
        </div>
        <div class="flex flex-col gap-2">
          <BaseHeading variant="h5">Values</BaseHeading>
          <ul class="list-disc pl-4">
            <li
              v-for="(value, index) in values"
              :key="index"
            >
              {{ value }}
            </li>
          </ul>
        </div>
        <div class="flex flex-row gap-4">
          <div class="flex flex-col gap-2 basis-1/2">
            <BaseHeading variant="h5">Goals</BaseHeading>
            <ul class="list-disc pl-4">
              <li
                v-for="(goal, index) in goals"
                :key="index"
              >
                {{ goal }}
              </li>
            </ul>
          </div>
          <div class="flex flex-col gap-2 basis-1/2">
            <BaseHeading variant="h5">Pain Points</BaseHeading>
            <ul class="list-disc pl-4">
              <li
                v-for="(painPoint, index) in painPoints"
                :key="index"
              >
                {{ painPoint }}
              </li>
            </ul>
          </div>
        </div>
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

<style lang="css" scoped>
h5 {
  opacity: 0.6;
}
</style>
