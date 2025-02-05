<template>
  <section
    v-if="land"
    class="flex flex-col p-8 gap-6"
  >
    <div class="flex flex-row gap-4 items-center justify-between">
      <LychenTitle variant="h2">{{ land.name }}</LychenTitle>
      <div class="flex flex-row gap-2 items-center">
        <LychenButton
          icon="gear"
          variant="container-high"
        />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <LychenTitle variant="h4">Vos tâches</LychenTitle>
        <div class="flex flex-row gap-2">
          <LychenButton
            icon="plus"
            variant="container-high"
          />
          <LychenButton
            icon="list-ul"
            variant="container-high"
          />
        </div>
      </div>
      <div
        v-if="landTasks"
        class="flex flex-col gap-2"
      >
        <CardTeraLandTask
          v-for="landTask in landTasks.member"
          :key="landTask.ulid"
          :land-task="landTask"
        />
      </div>
    </div>
  </section>
</template>

<script lang="ts" setup>
import type { Land } from '@lychen/tera-util-api-sdk/model/Land';
import { defineAsyncComponent, onBeforeMount, ref } from 'vue';
import LandRepository from '@lychen/tera-util-api-sdk/repositories/LandRepository';
import { useRoute, useRouter } from 'vue-router';
import LandTaskRepository from '@lychen/tera-util-api-sdk/repositories/LandTaskRepository';
import CardTeraLandTask from '@lychen/tera-land-task-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import { RoutePageDashboard } from '@pages/dashboard';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const land = ref<Land>();
const route = useRoute();
const router = useRouter();

async function fetchLand() {
  try {
    const response = await LandRepository.get(route.params.ulid);

    if (response.status === 200) {
      land.value = response.data;
    }
  } catch (e) {
    if (e.response.status === 404) {
      router.push(RoutePageDashboard);
    }
  }
}

onBeforeMount(async () => {
  await fetchLand();
  await fetchLandTasks();
});

const landTasks = ref();

async function fetchLandTasks() {
  const response = await LandTaskRepository.getCollection({
    params: { land: land.value?.['@id'], 'order[dueDate]': 'asc' },
  });

  if (response.status === 200) {
    landTasks.value = response.data;
  }
}
</script>

<style lang="css" scoped></style>
