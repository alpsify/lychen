<template>
  <section class="flex flex-col gap-6">
    <div class="flex flex-row gap-4 items-center justify-between">
      <Title variant="h2"
        >Bonjour,
        <span class="text-on-surface/70">{{
          zitadelAuth.oidcAuth.userProfile.given_name
        }}</span></Title
      >
      <div class="flex flex-row gap-2 items-center"></div>
    </div>
    <div
      :style="{ backgroundImage: `url(${headerImg})` }"
      class="rounded-3xl min-h-[200px] flex flex-col justify-end p-8 bg-center bg-no-repeat bg-cover"
    ></div>

    <div
      class="-mt-16 flex flex-row justify-between items-center bg-surface-container-low p-4 rounded-3xl shadow-md"
    >
      <div class="flex flex-col gap-0">
        <Title variant="h5">Note rapide</Title>
        <small>Journalisez vos observations</small>
      </div>
      <div class="flex flex-row gap-2 items-center">
        <Button
          :icon="faCamera"
          variant="container-high"
        />
        <Button
          :icon="faMicrophone"
          variant="container-high"
        />
        <Button
          :icon="faKeyboard"
          variant="container-high"
        />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <Title variant="h4">Vos espaces de culture</Title>
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

    <div class="gap-4 flex flex-col">
      <div class="flex flex-row gap-4 justify-between items-start">
        <div class="flex flex-col gap-1">
          <Title variant="h4">Trouver un espace de culture</Title>
          <small class="opacity-80">Dîte nous ce que vous recherchez on s'occupe du reste</small>
        </div>
        <Button
          :icon="faEllipsisVertical"
          variant="container-high"
        />
      </div>

      <Button>Créer une demande</Button>

      <Carousel
        v-if="lands"
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
      <Button variant="container-high">Voir toutes les annonces</Button>
    </div>
  </section>
</template>

<script lang="ts" setup>
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { defineAsyncComponent } from 'vue';
import Carousel from '@lychen/vue-ui-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-ui-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-ui-components-core/carousel/CarouselContent.vue';
import headerImg from './assets/header.webp';
import CardTeraLand from '@lychen/tera-ui-components/card-tera-land/CardTeraLand.vue';
import { VARIANT } from '@lychen/tera-ui-components/card-tera-land';
import { RoutePageLand } from '@pages/land';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faMicrophone } from '@fortawesome/pro-light-svg-icons/faMicrophone';
import { faKeyboard } from '@fortawesome/pro-light-svg-icons/faKeyboard';
import { faCamera } from '@fortawesome/pro-light-svg-icons/faCamera';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { faEllipsisVertical } from '@fortawesome/pro-light-svg-icons/faEllipsisVertical';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
);

const api = useTeraApi('Land');

const { data: lands } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    const response = await api.landGetCollection({});
    return response.data;
  },
});

const { data: landsLookingForMember } = useQuery({
  queryKey: ['landsLookingForMember'],
  queryFn: async () => {
    const response = await api.landGetCollectionLookingForMembers({});
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
