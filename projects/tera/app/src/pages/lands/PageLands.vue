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
        v-if="lands?.member || landMemberInvitations?.member"
        class="grid gap-8 grid-cols-(--grid-fluid) auto-rows-(--grid-rows-fluid)"
      >
        <template v-if="landMemberInvitations?.member">
          <CardTeraLandMemberInvitation
            v-for="landMemberInvitation in landMemberInvitations.member"
            :key="landMemberInvitation.ulid"
            :land-member-invitation="landMemberInvitation"
            :land-roles="landMemberInvitation.landRoles"
            :land="landMemberInvitation.land"
            :variant="VARIANT.ForUser"
            :hoverable="false"
            class="outline outline-offset-4 outline-secondary-container/40 border-0 bg-gradient-to-tr from-surface-container to-secondary-container"
          />
        </template>
        <template v-if="lands?.member">
          <RouterLink
            v-for="land in lands.member"
            :key="land.ulid"
            :to="{ name: RoutePageLandDashboard.name, params: { landUlid: land.ulid } }"
          >
            <CardTeraLand
              :name="land.name"
              :altitude="land.altitude"
              :surface="land.surface"
              :number-of-area="land.landAreas?.length"
              :number-of-member="land.landMembers?.length"
            />
          </RouterLink>
        </template>
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
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import CardTeraLandMemberInvitation from '@lychen/tera-ui-components/land-member-invitation/card/CardTeraLandMemberInvitation.vue';
import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { VARIANT } from '@lychen/tera-ui-components/land-member-invitation/card';
import {
  landMemberInvitationAcceptSucceededEvent,
  landMemberInvitationRefuseSucceededEvent,
} from '@lychen/tera-util-events/LandMemberInvitationEvents';
import { PathsApiLand_member_invitationsBy_emailGetParametersQueryState } from '@lychen/tera-util-api-sdk/generated/tera-api';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const open = ref(false);

const { api } = useTeraApi();

const { data: lands, refetch } = useQuery({
  queryKey: ['lands'],
  queryFn: async () => {
    const response = await api.GET('/api/lands');
    return response.data;
  },
});

const email = zitadelAuth.oidcAuth.userProfile.email;

const { data: landMemberInvitations, refetch: refetchLandMemberInvitations } = useQuery({
  queryKey: ['landMemberInvitations'],
  queryFn: async () => {
    if (!email) {
      throw new Error('missing.email');
    }
    const response = await api.GET('/api/land_member_invitations/by_email', {
      params: {
        query: {
          email,
          state: PathsApiLand_member_invitationsBy_emailGetParametersQueryState.pending,
        },
      },
    });
    return response.data;
  },
});

const { on } = useEventBus(landPostSucceededEvent);
on(() => {
  refetch();
  open.value = false;
});

const { on: onLandMemberInvitationAccept } = useEventBus(landMemberInvitationAcceptSucceededEvent);
const { on: onLandMemberInvitationRefuse } = useEventBus(landMemberInvitationRefuseSucceededEvent);

onLandMemberInvitationAccept(() => {
  refetch();
  refetchLandMemberInvitations();
});

onLandMemberInvitationRefuse(() => {
  refetch();
  refetchLandMemberInvitations();
});
</script>

<style lang="css" scoped></style>
