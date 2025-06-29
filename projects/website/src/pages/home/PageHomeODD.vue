<template>
  <Container class="flex flex-col items-center gap-4">
    <div class="flex flex-col-reverse md:grid md:grid-cols-[30%_1fr] gap-8 mt-10 w-full">
      <div class="flex flex-col justify-between gap-10">
        <Title variant="h2">{{ t('goals.title') }}</Title>
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
      <div class="rounded-2xl md:p-14 flex flex-col justify-center items-center">
        <div class="relative">
          <img
            v-if="selectedGoal"
            :src="`odd-icons/${selectedGoal.icon}`"
            class="rounded-2xl h-14 md:h-24 absolute odd-icon z-10"
            :alt="`Icône de l'objectif de développement durable n° ${selectedGoal.index}`"
          />
          <img
            :key="selectedGoal.index"
            :src="images[selectedGoal.index]"
            :alt="`Image de l'objectif de développement durable n° ${selectedGoal.index}`"
            class="rounded-2xl motion-preset-slide-left-sm"
          />
        </div>
      </div>
    </div>
  </Container>
</template>

<script setup lang="ts">
import Goal2Url from './assets/goal-2.webp';
import Goal12Url from './assets/goal-12.webp';
import Goal11Url from './assets/goal-11.webp';
import { computed, defineAsyncComponent, ref } from 'vue';
import { useOddCatalog } from '@lychen/odd-composables/useOddCatalog';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const GoalSubSection = defineAsyncComponent(
  () => import('@/pages/home/component/GoalSubSection.vue'),
);

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { two, eleven, twelve } = useOddCatalog();

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
