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
            variant="ghost"
        /></DialogTeraLandMemberDelete>
        <RouterLink
          :to="{ name: RoutePageLandMemberSettings.name, params: { landUlid: land.ulid } }"
        >
          <Button
            :icon="faUserGear"
            variant="ghost"
          />
        </RouterLink>
        <RouterLink
          v-if="settingsButtonAllowed"
          :to="{ name: RoutePageLandSettings.name, params: { landUlid: land.ulid } }"
        >
          <Button
            :icon="faGear"
            variant="ghost"
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
              size="sm"
              variant="outline"
          /></RouterLink>
        </div>
        <div class="flex flex-row gap-2">
          <Button
            label="Planifier une culture"
            :icon="faCalendarCirclePlus"
            variant="outline"
            size="sm"
            disabled
          />
          <Button
            label="Ajouter une tâche"
            :icon="faTasks"
            size="sm"
            variant="outline"
          />
          <Button
            label="Prendre une note"
            :icon="faNoteSticky"
            variant="outline"
            size="sm"
            disabled
          />
        </div>
        <div>
          <Button
            label="Enregistrer une mesure"
            :icon="faGridRound2Plus"
            disabled
            size="sm"
            variant="outline"
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
              variant="ghost"
              class="self-end"
              disabled
            />
            <RouterLink :to="RoutePageLandTasks">
              <Button
                label="Voir toutes les tâches"
                size="sm"
                variant="ghost"
              />
            </RouterLink>
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
          <BadgeDevelopmentInProgress class="self-start" />
          <Button
            label="Signaler un surplus"
            class="bg-purple-200 self-end text-black hover:bg-purple-700 hover:text-purple-200"
            :icon="faHandHoldingHeart"
            disabled
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
          <BadgeDevelopmentInProgress class="self-start" />
          <Button
            label="Demander"
            class="bg-amber-200 self-end text-black hover:bg-amber-700 hover:text-amber-200"
            :icon="faBee"
            disabled
          />
        </Card>
        <BannerTeraShareYourLand />
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <div class="flex flex-row items-center gap-4">
        <BaseHeading variant="h3">Zones de culture</BaseHeading>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faPlus"
            variant="ghost"
          />
          <Button
            :icon="faListUl"
            variant="ghost"
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
            variant="ghost"
          />
          <Button
            :icon="faListUl"
            variant="ghost"
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
import CardTeraLandGreenhouse from '@lychen/tera-components/land-greenhouse/card/CardTeraLandGreenhouse.vue';
import CardTeraLandArea from '@lychen/tera-components/land-area/card/CardTeraLandArea.vue';
import { useTeraApi } from '@lychen/tera-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import Carousel from '@lychen/vue-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-components-core/carousel/CarouselItem.vue';
import CarouselContent from '@lychen/vue-components-core/carousel/CarouselContent.vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faGear } from '@fortawesome/pro-light-svg-icons/faGear';
import {
  INJECTION_KEY_LAND,
  INJECTION_KEY_LAND_MEMBER,
} from '@lychen/tera-constants/InjectionKeys';
import { BaseHeading } from '@lychen/vue-components-app/base-heading';
import DialogTeraLandMemberDelete from '@lychen/tera-components/land-member/dialogs/delete/DialogTeraLandMemberDelete.vue';
import { RoutePageLandSettings } from '../settings';
import { faPersonToDoor } from '@fortawesome/pro-light-svg-icons/faPersonToDoor';
import { faUserGear } from '@fortawesome/pro-light-svg-icons/faUserGear';
import { faBee } from '@fortawesome/pro-light-svg-icons/faBee';
import { useLandGuard } from '@lychen/tera-composables/useLandGuard';
import { RoutePageLandMemberSettings } from '../member-settings';
import { landMemberLeaveSucceededEvent } from '@lychen/tera-events/LandMemberEvents';
import { RoutePageDashboard } from '@/pages/dashboard';
import { useEventBus } from '@vueuse/core';
import { faUserPlus } from '@fortawesome/pro-light-svg-icons/faUserPlus';
import { useRouter } from 'vue-router';
import Card from '@lychen/vue-components-core/card/Card.vue';
import { faHandHoldingHeart } from '@fortawesome/pro-light-svg-icons/faHandHoldingHeart';
import { faCalendarCirclePlus } from '@fortawesome/pro-light-svg-icons/faCalendarCirclePlus';
import { faTasks } from '@fortawesome/pro-light-svg-icons/faTasks';
import { faNoteSticky } from '@fortawesome/pro-light-svg-icons/faNoteSticky';
import { faGridRound2Plus } from '@fortawesome/pro-light-svg-icons/faGridRound2Plus';
import BadgeDevelopmentInProgress from '@lychen/vue-components-app/badge-development-in-progress/BadgeDevelopmentInProgress.vue';
import { RoutePageLandTasks } from '../tasks';
import BannerTeraShareYourLand from '@/components/banners/BannerTeraShareYourLand.vue';

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Button = defineAsyncComponent(() => import('@lychen/vue-components-core/button/Button.vue'));

const { api } = useTeraApi();

const land = inject(INJECTION_KEY_LAND);
const landMember = inject(INJECTION_KEY_LAND_MEMBER);

const { allowed: settingsButtonAllowed } = useLandGuard(landMember, ['land_update']);

const landUlid = computed(() => land?.value?.ulid);
const enabled = computed(() => !!landUlid.value);

const { data: landAreas } = useQuery({
  queryKey: ['landAreas', landUlid],
  queryFn: async () => {
    const response = await api.GET('/api/land_areas', {
      params: { query: { land: landUlid.value! } },
    });

    return response.data;
  },
  enabled,
});

const { data: landGreenhouses } = useQuery({
  queryKey: ['landGreenhouses', landUlid],
  queryFn: async () => {
    const response = await api.GET('/api/land_greenhouses', {
      params: { query: { land: landUlid.value! } },
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
