<template>
  <section
    v-if="land"
    class="flex flex-col p-8 gap-6"
  >
    <div class="flex flex-row gap-4 items-center justify-between">
      <Title variant="h2">{{ land.name }}</Title>
      <div class="flex flex-row gap-2 items-center">
        <Button
          :icon="faGear"
          variant="container-high"
        />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <Title variant="h4">Vos tâches</Title>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faPlus"
            variant="container-high"
          />
          <Button
            :icon="faListUl"
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
        <Title variant="h4">Zones</Title>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faPlus"
            variant="container-high"
          />
          <Button
            :icon="faListUl"
            variant="container-high"
          />
        </div>
      </div>

      <Carousel
        v-if="landAreas"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(item, index) in landAreas.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLandArea :land-area="item" />
          </CarouselItem>
        </CarouselContent>
      </Carousel>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <Title variant="h4">Serres</Title>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faPlus"
            variant="container-high"
          />
          <Button
            :icon="faListUl"
            variant="container-high"
          />
        </div>
      </div>

      <Carousel
        v-if="landGreenhouses"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(item, index) in landGreenhouses.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLandGreenhouse :land-greenhouse="item" />
          </CarouselItem>
        </CarouselContent>
      </Carousel>
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
import Carousel from '@lychen/vue-ui-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-ui-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-ui-components-core/carousel/CarouselContent.vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
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
