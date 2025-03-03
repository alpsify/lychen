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

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <LychenTitle variant="h4">Zones</LychenTitle>
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
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <LychenTitle variant="h4">Serres</LychenTitle>
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
    </div>
  </section>
</template>

<script lang="ts" setup>
import { defineAsyncComponent, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import CardTeraLandTask from '@lychen/tera-land-task-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import { RoutePageDashboard } from '@pages/dashboard';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { OrderDueDateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useQuery } from '@tanstack/vue-query';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const route = useRoute();
const router = useRouter();

const landApi = useTeraApi('Land');

const { data: land } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    const response = await landApi.get(<string>route.params.ulid);

    if (response.status !== 200) {
      return Promise.reject(router.push(RoutePageDashboard));
    }

    return response.data;
  },
});

const landId = computed(() => land.value?.['@id']);
const enabled = computed(() => !!land.value?.['@id']);

const landTaskApi = useTeraApi('LandTask');
const { data: landTasks } = useQuery({
  queryKey: ['landTasks', landId],
  queryFn: async () => {
    const response = await landTaskApi.getCollection({
      land: landId.value,
      'order[dueDate]': OrderDueDateEnum.Asc,
    });

    return response.data;
  },
  enabled,
});

const landAreaApi = useTeraApi('LandArea');
const { data: landAreas } = useQuery({
  queryKey: ['landAreas', landId],
  queryFn: async () => {
    const response = await landAreaApi.getCollection({
      land: landId.value,
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
