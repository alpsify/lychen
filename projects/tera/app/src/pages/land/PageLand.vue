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

      <LychenCarousel
        v-if="landAreas"
        :opts="{
          align: 'start',
        }"
      >
        <LychenCarouselContent>
          <LychenCarouselItem
            v-for="(item, index) in landAreas.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLandArea :land-area="item" />
          </LychenCarouselItem>
        </LychenCarouselContent>
      </LychenCarousel>
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

      <LychenCarousel
        v-if="landGreenhouses"
        :opts="{
          align: 'start',
        }"
      >
        <LychenCarouselContent>
          <LychenCarouselItem
            v-for="(item, index) in landGreenhouses.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLandGreenhouse :land-greenhouse="item" />
          </LychenCarouselItem>
        </LychenCarouselContent>
      </LychenCarousel>
    </div>
  </section>
</template>

<script lang="ts" setup>
import { defineAsyncComponent, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import CardTeraLandTask from '@lychen/tera-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import CardTeraLandGreenhouse from '@lychen/tera-ui-components/card-tera-land-greenhouse/CardTeraLandGreenhouse.vue';
import CardTeraLandArea from '@lychen/tera-ui-components/card-tera-land-area/CardTeraLandArea.vue';
import { RoutePageDashboard } from '@pages/dashboard';
import { useAllTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { OrderDueDateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useQuery } from '@tanstack/vue-query';
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const route = useRoute();
const router = useRouter();

const api = useAllTeraApi();

const { data: land } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    const response = await api.Land.landGet(<string>route.params.ulid);

    if (response.status !== 200) {
      return Promise.reject(router.push(RoutePageDashboard));
    }

    return response.data;
  },
});

const landId = computed(() => land.value?.['@id']);
const enabled = computed(() => !!landId.value);

const { data: landTasks } = useQuery({
  queryKey: ['landTasks', landId],
  queryFn: async () => {
    const response = await api.LandTask.landTaskGetCollection({
      land: landId.value!,
      'order[dueDate]': OrderDueDateEnum.Asc,
    });

    return response.data;
  },
  enabled,
});

const { data: landAreas } = useQuery({
  queryKey: ['landAreas', landId],
  queryFn: async () => {
    const response = await api.LandArea.landAreaGetCollection({
      land: landId.value!,
    });

    return response.data;
  },
  enabled,
});

const { data: landGreenhouses } = useQuery({
  queryKey: ['landAreas', landId],
  queryFn: async () => {
    const response = await api.LandGreenhouse.landGreenhouseGetCollection({
      land: landId.value!,
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
