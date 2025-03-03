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
import { defineAsyncComponent, onBeforeMount, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import CardTeraLandTask from '@lychen/tera-land-task-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import { RoutePageDashboard } from '@pages/dashboard';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { OrderDueDateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const landApi = useTeraApi('Land');
const landTaskApi = useTeraApi('LandTask');

const land = ref();
const route = useRoute();
const router = useRouter();

async function fetchLand() {
  try {
    const response = await landApi.get(<string>route.params.ulid);

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
  const response = await landTaskApi.getCollection({
    land: land.value?.['@id'],
    'order[dueDate]': OrderDueDateEnum.Asc,
  });

  if (response.status === 200) {
    landTasks.value = response.data;
  }
}
</script>

<style lang="css" scoped></style>
