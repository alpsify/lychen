<template>
  <Card class="flex flex-row gap-10">
    <div class="rounded-2xl basis-1/3">
      <img
        :src="`/persona/${id}.webp`"
        class="h-full aspect-2/3 object-cover rounded-2xl"
      />
    </div>
    <div class="flex flex-col gap-8 items-stretch basis-2/3">
      <div class="flex flex-row justify-between items-center">
        <BaseHeading>{{ fullName }}</BaseHeading>
        <Badge>{{ id }}</Badge>
      </div>

      <div class="flex flex-row gap-4">
        <div class="flex flex-col basis-1/2">
          <BaseHeading
            variant="h4"
            class=""
            >{{ jobTitle }}</BaseHeading
          >
        </div>
        <div class="flex flex-col basis-1/2">
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
      <div>
        <BaseHeading variant="h5">Biography</BaseHeading>
        <p>{{ biography }}</p>
      </div>
      <div>
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
        <div class="basis-1/2">
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
        <div class="basis-1/2">
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
  </Card>
</template>

<script setup lang="ts">
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import type { Props } from '.';
import BaseHeading from '@lychen/vue-ui-components-app/base-heading/BaseHeading.vue';
import { Badge } from '@lychen/vue-ui-components-core/badge';

defineProps<Props>();
</script>

<style lang="css" scoped>
h5 {
  opacity: 0.6;
  margin-bottom: 15px;
}
</style>
