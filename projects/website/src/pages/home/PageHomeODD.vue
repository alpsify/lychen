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
    <div class="flex flex-col-reverse md:grid md:grid-cols-[30%_1fr] gap-8 mt-10 w-full">
      <div class="flex flex-col justify-between gap-10">
        <LychenTitle variant="h2">{{ t('goals.title') }}</LychenTitle>
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
      <div
        class="rounded-2xl bg-gradient-to-tr from-surface-container-highest to-transparent md:p-14"
      >
        <div class="relative">
          <img
            v-if="selectedGoal"
            :src="`odd-icons/${selectedGoal.icon}`"
            class="rounded-2xl h-14 md:h-24 absolute odd-icon z-10"
          />
          <img
            :key="selectedGoal.index"
            :src="images[selectedGoal.index]"
            class="rounded-2xl motion-preset-slide-left-sm"
          />
        </div>
      </div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import Goal2Url from './assets/goal-2.webp';
import Goal12Url from './assets/goal-12.webp';
import Goal11Url from './assets/goal-11.webp';
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

const images: { [key: number]: string } = {
  2: Goal2Url,
  11: Goal11Url,
  12: Goal12Url,
};
</script>

<style scoped>
.odd-icon {
  top: -28px;
  left: -28px;
}
</style>
