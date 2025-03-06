<template>
  <SectionTwoThird title="Co Gardening">
    <div>
      <BaseHeading>Déposer une annonces</BaseHeading>
      <p>Dîte nous ce que vous recherchez on s'occupe du reste</p>
    </div>
    <div class="flex flex-col gap-4">
      <BaseHeading>Les espaces de culture qui recherche des co-jardineurs</BaseHeading>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua.
      </p>
      <Carousel
        v-if="landsLookingForMember"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="(landItem, index) in landsLookingForMember.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLand
              :land="landItem"
              :variant="VARIANT.LookingForMember"
            />
          </CarouselItem>
        </CarouselContent>
      </Carousel>
    </div>
  </SectionTwoThird>
</template>

<script lang="ts" setup>
import SectionTwoThird from '@lychen/vue-ui-components-app/section-two-third/SectionTwoThird.vue';
import { VARIANT } from '@lychen/tera-ui-components/card-tera-land';

import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import { useQuery } from '@tanstack/vue-query';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import Carousel from '@lychen/vue-ui-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-ui-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-ui-components-core/carousel/CarouselContent.vue';
import CardTeraLand from '@lychen/tera-ui-components/card-tera-land/CardTeraLand.vue';

const api = useTeraApi('Land');

const { data: landsLookingForMember } = useQuery({
  queryKey: ['landsLookingForMember'],
  queryFn: async () => {
    const response = await api.landGetCollectionLookingForMembers({});
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
