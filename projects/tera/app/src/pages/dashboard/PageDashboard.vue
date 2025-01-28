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
          variant="container-high"
          icon="bell"
        />
        <LychenButton
          variant="container-high"
          icon="gear"
        />
      </div>
    </div>
    <div
      class="rounded-3xl min-h-[200px] flex flex-col justify-end p-8 bg-center bg-no-repeat bg-cover"
      :style="{ backgroundImage: `url(${headerImg})` }"
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
          variant="container-high"
          icon="camera"
        />
        <LychenButton
          variant="container-high"
          icon="microphone"
        />
        <LychenButton
          variant="container-high"
          icon="keyboard"
        />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <LychenTitle variant="h4">Vos espaces de culture</LychenTitle>
        <div class="flex flex-row items-center gap-2">
          <LychenButton
            variant="secondary"
            icon="plus"
          />
          <LychenButton
            variant="container-high"
            icon="list-ul"
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
            <div
              class="p-6 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-col gap-2 h-full justify-between items-stretch active:bg-surface-container-highest"
            >
              <div class="flex flex-row gap-2 items-center justify-between">
                <LychenBadge class="self-start bg-tertiary-container text-on-tertiary-container">{{
                  landItem.kind
                }}</LychenBadge>
                <LychenIcon :icon="landItem.landMembers.length === 1 ? 'user' : 'users'" />
              </div>
              <div class="flex flex-col gap-1">
                <small class="text-tertiary">{{ landItem.landAreas.length }} zones</small>
                <LychenTitle variant="h3">{{ landItem.name }}</LychenTitle>
              </div>
            </div>
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
          variant="container-high"
          icon="ellipsis-vertical"
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
            <div
              class="p-6 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-col gap-2 h-full justify-between items-stretch active:bg-surface-container-highest"
            >
              <div class="flex flex-row gap-2 items-center justify-between">
                <LychenBadge class="self-start bg-tertiary-container text-on-tertiary-container">{{
                  landItem.kind
                }}</LychenBadge>
                <LychenIcon :icon="landItem.landMembers.length === 1 ? 'user' : 'users'" />
              </div>
              <div class="flex flex-col gap-1">
                <small class="text-tertiary">{{ landItem.landAreas.length }} zones</small>
                <LychenTitle variant="h3">{{ landItem.name }}</LychenTitle>
              </div>
            </div>
          </LychenCarouselItem>
        </LychenCarouselContent>
      </LychenCarousel>
      <LychenButton variant="container-high">Voir toutes les annonces</LychenButton>
    </div>
    <div class="gap-4 flex flex-col">
      <LychenTitle variant="h4">Resources</LychenTitle>
    </div>
  </section>
</template>

<script lang="ts" setup>
import zitadelAuth from '@/services/ZitadelAuth';
import { defineAsyncComponent, onBeforeMount, ref } from 'vue';
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';
import headerImg from './assets/header.webp';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenBadge = defineAsyncComponent(
  () => import('@lychen/ui-components/badge/LychenBadge.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const lands = ref();

async function fetchLands() {
  try {
    const response = await fetch('https://api.tera.lychen.local/api/lands', {
      headers: {
        Authorization: `Bearer ${zitadelAuth.oidcAuth.accessToken}`,
      },
    });

    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    lands.value = await response.json();
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}

onBeforeMount(() => {
  fetchLands();
  fetchLandsLookingForMember();
});

const landsLookingForMember = ref();

async function fetchLandsLookingForMember() {
  try {
    const response = await fetch('https://api.tera.lychen.local/api/lands/looking_for_member', {
      headers: {
        Authorization: `Bearer ${zitadelAuth.oidcAuth.accessToken}`,
      },
    });

    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }

    landsLookingForMember.value = await response.json();
    //console.log(json);
  } catch (e) {
    //console.log(e);
  }
}
</script>

<style lang="css" scoped></style>
