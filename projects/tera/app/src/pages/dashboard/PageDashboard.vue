<template>
  <section class="flex flex-col p-8 gap-6">
    <div class="flex flex-row gap-4 items-center justify-between">
      <LychenTitle variant="h2"
        >Bonjour,
        <span class="text-on-surface/70">{{
          zitadelAuth.oidcAuth.userProfile.given_name
        }}</span></LychenTitle
      >
      <div class="flex flex-row gap-2 items-center">
        <LychenButton
          icon="bell"
          variant="container-high"
        />
        <LychenButton
          icon="gear"
          variant="container-high"
        />
      </div>
    </div>
    <div
      :style="{ backgroundImage: `url(${headerImg})` }"
      class="rounded-3xl min-h-[200px] flex flex-col justify-end p-8 bg-center bg-no-repeat bg-cover"
    ></div>

    <div
      class="-mt-16 flex flex-row justify-between items-center bg-surface-container-low p-4 rounded-3xl shadow-md"
    >
      <div class="flex flex-col gap-0">
        <LychenTitle variant="h5">Note rapide</LychenTitle>
        <small>Journalisez vos observations</small>
      </div>
      <div class="flex flex-row gap-2 items-center">
        <LychenButton
          icon="camera"
          variant="container-high"
        />
        <LychenButton
          icon="microphone"
          variant="container-high"
        />
        <LychenButton
          icon="keyboard"
          variant="container-high"
        />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <LychenTitle variant="h4">Vos espaces de culture</LychenTitle>
        <div class="flex flex-row items-center gap-2">
          <LychenButton
            icon="plus"
            variant="secondary"
          />
          <LychenButton
            icon="list-ul"
            variant="container-high"
          />
        </div>
      </div>
      <LychenCarousel
        v-if="lands"
        :opts="{
          align: 'start',
        }"
      >
        <LychenCarouselContent>
          <LychenCarouselItem
            v-for="(landItem, index) in lands.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <RouterLink :to="{ name: RoutePageLand.name, params: { ulid: landItem.ulid } }">
              <CardTeraLand :land="landItem" />
            </RouterLink>
          </LychenCarouselItem>
        </LychenCarouselContent>
      </LychenCarousel>
    </div>

    <div class="gap-4 flex flex-col">
      <div class="flex flex-row gap-4 justify-between items-start">
        <div class="flex flex-col gap-1">
          <LychenTitle variant="h4">Trouver un espace de culture</LychenTitle>
          <small class="opacity-80">Dîte nous ce que vous recherchez on s'occupe du reste</small>
        </div>
        <LychenButton
          icon="ellipsis-vertical"
          variant="container-high"
        />
      </div>

      <LychenButton>Créer une demande</LychenButton>

      <LychenCarousel
        v-if="lands"
        :opts="{
          align: 'start',
        }"
      >
        <LychenCarouselContent>
          <LychenCarouselItem
            v-for="(landItem, index) in landsLookingForMember.member"
            :key="index"
            class="basis-3/5 md:basis-1/2 lg:basis-1/4 h-[200px]"
          >
            <CardTeraLand
              :land="landItem"
              :variant="VARIANT.LookingForMember"
            />
          </LychenCarouselItem>
        </LychenCarouselContent>
      </LychenCarousel>
      <LychenButton variant="container-high">Voir toutes les annonces</LychenButton>
    </div>
    <div class="gap-4 flex flex-col">
      <LychenTitle variant="h4">Ressources</LychenTitle>
    </div>
  </section>
</template>

<script lang="ts" setup>
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { defineAsyncComponent, onBeforeMount, ref } from 'vue';
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';
import headerImg from './assets/header.webp';
import LandRepository from '@lychen/tera-util-api-sdk/repositories/LandRepository';
import CardTeraLand from '@lychen/tera-land-ui-components/card-tera-land/CardTeraLand.vue';
import { VARIANT } from '@lychen/tera-land-ui-components/card-tera-land';
import { RoutePageLand } from '@pages/land';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

onBeforeMount(() => {
  fetchLands();
  fetchLandsLookingForMember();
});

const landApi = useTeraApi('Land');
const lands = ref();

async function fetchLands() {
  try {
    const response = await landApi.apiLandsGetCollection({});
    lands.value = response.data;
  } catch (e) {
    // console.log(e);
  }
}

const landsLookingForMember = ref();

async function fetchLandsLookingForMember() {
  try {
    const response = await LandRepository.getCollectionLookingForMember();

    if (response.status === 200) {
      landsLookingForMember.value = response.data;
    }
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}
</script>

<style lang="css" scoped></style>
