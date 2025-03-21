<template>
  <SectionWithTitle>
    <template #title>
      <DivWithBackgroundImg
        :background-image="bannerImg"
        overlay
        overlay-class="bg-gradient-to-tr from-secondary-container to-secondary-container/30"
        class="py-20 md:py-30 px-10 rounded-xl flex flex-col gap-4"
      >
        <div class="z-10 flex flex-col gap-8 md:flex-row md:justify-between md:items-center">
          <div class="flex flex-col gap-1">
            <BaseHeading class="z-10 text-on-secondary-container">{{ t('title') }}</BaseHeading>
            <p
              v-if="lands?.totalItems"
              class="font-medium text-on-secondary-container opacity-80"
            >
              {{ t('sub_title', lands.totalItems) }}
            </p>
          </div>
          <DialogTeraLandCreate v-model:open="open">
            <Button
              :icon="faPlus"
              class="bg-secondary text-on-secondary"
              :text="t('add_land')"
            />
          </DialogTeraLandCreate>
        </div>
      </DivWithBackgroundImg>
    </template>
    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <div class="flex flex-row items-center gap-2"></div>
      </div>

      <div
        v-if="lands?.member"
        class="grid gap-8 grid-cols-(--grid-fluid) auto-rows-(--grid-rows-fluid)"
      >
        <RouterLink
          v-for="land in lands.member"
          :key="land.ulid"
          :to="{ name: RoutePageLandDashboard.name, params: { landUlid: land.ulid } }"
        >
          <CardTeraLand :land />
        </RouterLink>
      </div>
    </div>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import bannerImg from './assets/banner.webp';
import { DivWithBackgroundImg } from '@lychen/vue-ui-components-extra/div-with-background-img';
import CardTeraLand from '@lychen/tera-ui-components/land/card/CardTeraLand.vue';
import { RoutePageLandDashboard } from '@pages/land/dashboard';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';
import { useEventBus } from '@vueuse/core';
import { landPostSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import { ref } from 'vue';
import DialogTeraLandCreate from '@lychen/tera-ui-components/land/dialogs/create/DialogTeraLandCreate.vue';
import BaseHeading from '@lychen/vue-ui-components-app/base-heading/BaseHeading.vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const open = ref(false);

const api = useTeraApi('Land');
const { data: lands, refetch } = useQuery({
  queryKey: ['lands'],
  queryFn: async () => {
    const response = await api.landGetCollection({});
    return response.data;
  },
});

const { on } = useEventBus(landPostSucceededEvent);
on(() => {
  refetch();
  open.value = false;
});
</script>

<style lang="css" scoped></style>
