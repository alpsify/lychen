<template>
  <SectionWithTitle title="Vos espaces de culture">
    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <div class="flex flex-row items-center gap-2">
          <Button
            :icon="faPlus"
            variant="secondary"
          />
          <Button
            :icon="faListUl"
            variant="container-high"
          />
        </div>
      </div>
      <Carousel
        v-if="lands"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(landItem, index) in lands.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <RouterLink :to="{ name: RoutePageLand.name, params: { ulid: landItem.ulid } }">
              <CardTeraLand :land="landItem" />
            </RouterLink>
          </CarouselItem>
        </CarouselContent>
      </Carousel>
    </div>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import Carousel from '@lychen/vue-ui-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-ui-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-ui-components-core/carousel/CarouselContent.vue';
import CardTeraLand from '@lychen/tera-ui-components/card-tera-land/CardTeraLand.vue';

import { RoutePageLand } from '@pages/land';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';

const api = useTeraApi('Land');

const { data: lands } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    const response = await api.landGetCollection({});
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
