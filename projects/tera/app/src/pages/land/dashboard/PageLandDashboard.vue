<template>
  <section
    v-if="land"
    class="flex flex-col gap-6"
  >
    <div class="flex flex-row gap-4 items-center justify-between">
      <BaseHeading>{{ land.name }}</BaseHeading>
      <div class="flex flex-row gap-2">
        <DialogTeraLandMemberDelete
          v-if="!isOwner"
          :land-member="landMember"
        >
          <Button
            :icon="faPersonToDoor"
            variant="container-high"
        /></DialogTeraLandMemberDelete>
        <RouterLink :to="{ name: RoutePageLandSettings.name, params: { landUlid: land.ulid } }">
          <Button
            :icon="faUserGear"
            variant="container-high"
          />
        </RouterLink>
        <RouterLink
          v-if="settingsButtonAllowed"
          :to="{ name: RoutePageLandSettings.name, params: { landUlid: land.ulid } }"
        >
          <Button
            :icon="faGear"
            variant="container-high"
          />
        </RouterLink>
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
import { defineAsyncComponent, computed, inject } from 'vue';
import CardTeraLandGreenhouse from '@lychen/tera-ui-components/land-greenhouse/card/CardTeraLandGreenhouse.vue';
import CardTeraLandArea from '@lychen/tera-ui-components/land-area/card/CardTeraLandArea.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import Carousel from '@lychen/vue-ui-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-ui-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-ui-components-core/carousel/CarouselContent.vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';
import { INJECT_LAND_KEY, INJECT_LAND_MEMBER_KEY } from '@/layouts/in-app';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import DialogTeraLandMemberDelete from '@lychen/tera-ui-components/land-member/dialogs/delete/DialogTeraLandMemberDelete.vue';
import { RoutePageLandSettings } from '../settings';
import { faPersonToDoor } from '@fortawesome/pro-light-svg-icons/faPersonToDoor';
import { faUserGear } from '@fortawesome/pro-light-svg-icons/faUserGear';
import { useLandGuard } from '@lychen/tera-util-composables/useLandGuard';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
);

const { api } = useTeraApi();

const land = inject(INJECT_LAND_KEY);
const landMember = inject(INJECT_LAND_MEMBER_KEY);

const { allowed: settingsButtonAllowed, isOwner } = useLandGuard(landMember, ['land_update']);

const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const { data: landAreas } = useQuery({
  queryKey: ['landAreas', landId],
  queryFn: async () => {
    const response = await api.GET('/api/land_areas', {
      params: { query: { land: landId.value! } },
    });

    return response.data;
  },
  enabled,
});

const { data: landGreenhouses } = useQuery({
  queryKey: ['landGreenhouses', landId],
  queryFn: async () => {
    const response = await api.GET('/api/land_greenhouses', {
      params: { query: { land: landId.value! } },
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
