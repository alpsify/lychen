<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('applications.title') }}</LychenTitle>
    <LychenTitle
      variant="h2"
      class="opacity-80 text-center"
      >{{ t('applications.second_title') }}</LychenTitle
    >
  </LychenContainer>
  <LychenContainer class="flex flex-col items-center gap-4">
    <div class="flex flex-col-reverse md:grid md:grid-cols-[30%_1fr] gap-8 mt-10">
      <div class="flex flex-col justify-between gap-10">
        <LychenTitle variant="h3">{{ t('goals.title') }}</LychenTitle>
        <GoalSubSection
          v-for="goal in goals"
          :key="goal.index"
          :title="goal.title"
          :description="goal.description"
          :link="{
            title: t(`goals.link_title.${goal.index}`),
            href: goal.link,
          }"
          :expanded="goal.index === selectedGoal.index"
          @click="selectedGoal = goal"
        />
      </div>
      <div class="rounded-2xl bg-gradient-to-r from-secondary-container to-secondary md:p-8">
        <img
          v-if="selectedGoal"
          :src="`odd-icons/${selectedGoal.icon}`"
          class="rounded-lg h-14 md:h-24 absolute m-2 fade-in-10"
        />
        <img
          src="./assets/definition.webp"
          class="rounded-lg"
        />
      </div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import { computed, defineAsyncComponent, ref } from 'vue';

import { useTranslations } from './i18n';
import { useOdd } from '@lychen/util-odd/composables/useOdd';

const GoalSubSection = defineAsyncComponent(
  () => import('@/pages/home/component/GoalSubSection.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useTranslations();

const { two, eleven, twelve } = useOdd();

const goals = computed(() => [eleven.value, two.value, twelve.value]);
const selectedGoal = ref(eleven.value);
</script>
