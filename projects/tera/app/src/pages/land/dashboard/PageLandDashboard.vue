<template>
  <section
    v-if="land"
    class="flex flex-col gap-6"
  >
    <div class="flex flex-row gap-4 items-center justify-between">
      <BaseHeading>{{ land.name }}</BaseHeading>
      <div class="flex flex-row gap-2">
        <DialogTeraLandMemberDelete
          v-if="landMember && !landMember.owner"
          :land-member="landMember"
          leave
        >
          <Button
            :icon="faPersonToDoor"
            variant="container-high"
        /></DialogTeraLandMemberDelete>
        <RouterLink
          :to="{ name: RoutePageLandMemberSettings.name, params: { landUlid: land.ulid } }"
        >
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

    <div class="grid grid-cols-[1fr_30%] gap-8 grid-rows-2 dashboard-grid">
      <div
        id="header"
        class="flex flex-row justify-between p-4 border-1 border-surface-container/100 rounded-xl items-center"
      >
        <div class="flex flex-row gap-4 items-center">
          <BaseHeading variant="h4">Actions rapide</BaseHeading>
          <RouterLink :to="RoutePageLandSettings">
            <Button
              label="Inviter"
              :icon="faUserPlus"
              variant="secondary"
          /></RouterLink>
        </div>
        <div class="flex flex-row gap-2">
          <Button
            label="Planifier une culture"
            :icon="faCalendarCirclePlus"
            variant="secondary"
          />
          <Button
            label="Ajouter une tâche"
            :icon="faTasks"
            variant="secondary"
          />
          <Button
            label="Prendre une note"
            :icon="faNoteSticky"
            variant="secondary"
          />
        </div>
        <div>
          <Button
            label="Enregistrer une mesure"
            :icon="faGridRound2Plus"
            variant="secondary"
          />
        </div>
      </div>
      <div id="principal">
        <div class="bg-surface-container p-8 h-full rounded-xl flex flex-col gap-4 justify-between">
          <BaseHeading>Tâches en cours</BaseHeading>
          <div class="flex flex-row gap-4 self-end">
            <Button
              label="Voir les calendriers"
              size="sm"
              variant="container-high"
              class="self-end"
            />
            <Button
              label="Voir toutes les tâches"
              size="sm"
              variant="container-high"
            />
          </div>
        </div>
      </div>

      <div
        id="side"
        class="flex flex-col gap-8"
      >
        <Card class="bg-gradient-to-tr from-purple-500 to-pink-500 gap-4">
          <div class="flex flex-col gap-0">
            <BaseHeading variant="h3">Un surplus ?</BaseHeading>
            <p>Signalez le on s'occupe de trouver quelqu'un pour que ce ne soit pas perdu.</p>
          </div>
          <Button
            label="Signaler un surplus"
            class="bg-purple-200 self-end text-black hover:bg-purple-700 hover:text-purple-200"
            :icon="faHandHoldingHeart"
          />
        </Card>
        <Card class="bg-gradient-to-tr from-amber-500 to-yellow-500 gap-4">
          <div class="flex flex-col gap-0 text-amber-800">
            <BaseHeading
              variant="h3"
              class="text-amber-800"
              >Pollinisateurs</BaseHeading
            >
            <p>Voulez-vous accueillir des pollinisateurs ?</p>
          </div>

          <Button
            label="Demander"
            class="bg-amber-200 self-end text-black hover:bg-amber-700 hover:text-amber-200"
            :icon="faBee"
          />
        </Card>
        <Card class="bg-gradient-to-tr from-surface-container to-blue-300/30 gap-4">
          <div class="flex flex-col gap-0">
            <BaseHeading variant="h3">Données</BaseHeading>
            <p class="opacity-80">On s'occupe de vous générer des revenus grâce à vos données.</p>
          </div>
          <p class="font-bold flex flex-row gap-2 items-center">
            Valeur estimé : <Skeleton class="w-[30px] h-5" /> € /mois
          </p>
          <BadgeDevelopmentInProgress class="self-start" />
          <Button
            disabled
            label="Configurer"
            variant="container-high"
            class="self-end"
            :icon="faDatabase"
          />
        </Card>
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row items-center gap-4">
        <BaseHeading variant="h3">Zones de culture</BaseHeading>
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
            class="basis-3/5 md:basis-1/2 lg:basis-1/10 h-[100px]"
          >
            <CardTeraLandArea
              :land-area="item"
              hoverable
            />
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
            class="basis-3/5 md:basis-1/2 lg:basis-1/8 h-[200px]"
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
import { faBee } from '@fortawesome/pro-light-svg-icons/faBee';
import { useLandGuard } from '@lychen/tera-util-composables/useLandGuard';
import { RoutePageLandMemberSettings } from '../member-settings';
import { landMemberLeaveSucceededEvent } from '@lychen/tera-util-events/LandMemberEvents';
import { RoutePageDashboard } from '@/pages/dashboard';
import { useEventBus } from '@vueuse/core';
import { faUserPlus } from '@fortawesome/pro-light-svg-icons/faUserPlus';
import { useRouter } from 'vue-router';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faCalendarCirclePlus } from '@fortawesome/pro-light-svg-icons/faCalendarCirclePlus';
import { faTasks } from '@fortawesome/pro-light-svg-icons/faTasks';
import { faNoteSticky } from '@fortawesome/pro-light-svg-icons/faNoteSticky';
import { faDatabase } from '@fortawesome/pro-light-svg-icons/faDatabase';
import { faGridRound2Plus } from '@fortawesome/pro-light-svg-icons/faGridRound2Plus';
import { Skeleton } from '@lychen/vue-ui-components-core/skeleton';
import BadgeDevelopmentInProgress from '@lychen/vue-ui-components-app/badge-development-in-progress/BadgeDevelopmentInProgress.vue';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
);

const { api } = useTeraApi();

const land = inject(INJECT_LAND_KEY);
const landMember = inject(INJECT_LAND_MEMBER_KEY);

const { allowed: settingsButtonAllowed } = useLandGuard(landMember, ['land_update']);

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

const router = useRouter();
const { on } = useEventBus(landMemberLeaveSucceededEvent);

on(() => {
  router.push(RoutePageDashboard);
});
</script>

<style lang="css" scoped>
.dashboard-grid {
  grid-template-areas: 'header header' 'principal side';
  grid-template-rows: auto;

  #header {
    grid-area: header;
  }

  #principal {
    grid-area: principal;
  }

  #side {
    grid-area: side;
  }
}
</style>
