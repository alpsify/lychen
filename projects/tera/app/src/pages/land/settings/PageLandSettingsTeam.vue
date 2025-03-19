<template>
  <SectionSetting
    :title="t('tabs.team.members.title')"
    :description="t('tabs.team.members.description')"
  >
    <div
      v-if="landMembers"
      class="flex flex-col gap-4"
    >
      <DialogTeraLandMemberUpdate
        v-for="(item, index) in landMembers.member"
        :key="index"
        :land-member="item"
      >
        <CardTeraLandMember :land-member="item" />
      </DialogTeraLandMemberUpdate>
    </div>
  </SectionSetting>
  <SectionSetting
    :title="t('tabs.team.invitations.title')"
    :description="t('tabs.team.invitations.description')"
  >
    <template #subTitle>
      <Button
        :icon="faPlus"
        variant="container-high"
        class="self-start"
        :text="tLandMemberInvitation('action.create.label')"
      ></Button>
    </template>
    <div
      v-if="landMemberInvitations && landMemberInvitations.member.length !== 0"
      class="flex flex-col gap-4"
    >
      <Card
        v-for="(item, index) in landMemberInvitations.member"
        :key="index"
        class=""
      >
        {{ item.email }}</Card
      >
    </div>
    <div
      v-else
      class="flex flex-row items-center justify-center h-full opacity-70"
    >
      Aucune invitations en attente
    </div>
  </SectionSetting>
  <SectionSetting
    :title="t('tabs.team.roles.title')"
    :description="t('tabs.team.roles.description')"
  >
    <template #subTitle>
      <DialogTeraLandRoleCreate
        v-if="land"
        :land="land"
      >
        <Button
          :icon="faPlus"
          variant="container-high"
          class="self-start"
          :text="tLandRole('action.create.label')"
        ></Button>
      </DialogTeraLandRoleCreate>
    </template>
    <div
      v-if="landRoles"
      class="flex flex-col gap-4"
    >
      <DialogTeraLandRoleUpdate
        v-for="(item, index) in landRoles.member"
        :key="index"
        :land-role="item"
      >
        <CardTeraLandRole :land-role="item" />
      </DialogTeraLandRoleUpdate>
    </div>
  </SectionSetting>
</template>

<script setup lang="ts">
import { SectionSetting } from '@lychen/vue-ui-components-app/section-setting';

import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import {
  messages as landRoleMessages,
  TRANSLATION_KEY as LAND_ROLE_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-role';
import {
  messages as landMemberInvitationMessages,
  TRANSLATION_KEY as LAND_MEMBER_INVITATION_TRANSLATION_KEY,
} from '@lychen/tera-ui-i18n/land-member-invitation';
import { computed, inject } from 'vue';
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import { useQuery } from '@tanstack/vue-query';
import { useAllTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import Card from '@lychen/vue-ui-components-core/card/Card.vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import CardTeraLandRole from '@lychen/tera-ui-components/land-role/card/CardTeraLandRole.vue';
import DialogTeraLandRoleCreate from '@lychen/tera-ui-components/land-role/dialogs/create/DialogTeraLandRoleCreate.vue';
import DialogTeraLandRoleUpdate from '@lychen/tera-ui-components/land-role/dialogs/update/DialogTeraLandRoleUpdate.vue';

import {
  landRolePostSucceededEvent,
  landRolePatchSucceededEvent,
  landRoleDeleteSucceededEvent,
} from '@lychen/tera-util-events/LandRoleEvents';
import { useEventBus } from '@vueuse/core';
import CardTeraLandMember from '@lychen/tera-ui-components/land-member/card/CardTeraLandMember.vue';
import DialogTeraLandMemberUpdate from '@lychen/tera-ui-components/land-member/dialogs/update/DialogTeraLandMemberUpdate.vue';
import {
  landMemberDeleteSucceededEvent,
  landMemberPatchSucceededEvent,
} from '@lychen/tera-util-events/LandMemberEvents';
import {
  landMemberInvitationDeleteSucceededEvent,
  landMemberInvitationPatchSucceededEvent,
  landMemberInvitationPostSucceededEvent,
} from '@lychen/tera-util-events/LandMemberInvitationEvents';

const land = inject(INJECT_LAND_KEY);
const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const { t: tLandRole } = useI18nExtended({
  messages: landRoleMessages,
  rootKey: LAND_ROLE_TRANSLATION_KEY,
  prefixed: true,
});

const { t: tLandMemberInvitation } = useI18nExtended({
  messages: landMemberInvitationMessages,
  rootKey: LAND_MEMBER_INVITATION_TRANSLATION_KEY,
  prefixed: true,
});

const api = useAllTeraApi();

const { data: landRoles, refetch: refetchLandRoles } = useQuery({
  queryKey: ['landRoles', landId],
  queryFn: async () => {
    if (!landId.value) {
      throw new Error('missing.land_id');
    }

    const response = await api.LandRole.landRoleGetCollection({
      land: landId.value,
    });

    return response.data;
  },
  enabled,
});

const { on: onLandRolePost } = useEventBus(landRolePostSucceededEvent);
const { on: onLandRolePatch } = useEventBus(landRolePatchSucceededEvent);
const { on: onLandRoleDelete } = useEventBus(landRoleDeleteSucceededEvent);

onLandRolePost(() => {
  refetchLandRoles();
});

onLandRolePatch(() => {
  refetchLandRoles();
});

onLandRoleDelete(() => {
  refetchLandRoles();
});

const { data: landMemberInvitations, refetch: refetchLandMemberInvitations } = useQuery({
  queryKey: ['landMemberInvitations', landId],
  queryFn: async () => {
    if (!landId.value) {
      throw new Error('missing.land_id');
    }

    const response = await api.LandMemberInvitation.landMemberInvitationGetCollection({
      land: landId.value,
    });

    return response.data;
  },
  enabled,
});

const { on: onLandMemberInvitationPost } = useEventBus(landMemberInvitationPostSucceededEvent);
const { on: onLandMemberInvitationPatch } = useEventBus(landMemberInvitationPatchSucceededEvent);
const { on: onLandMemberInvitationDelete } = useEventBus(landMemberInvitationDeleteSucceededEvent);

onLandMemberInvitationPost(() => {
  refetchLandMemberInvitations();
});

onLandMemberInvitationPatch(() => {
  refetchLandMemberInvitations();
});

onLandMemberInvitationDelete(() => {
  refetchLandMemberInvitations();
});

const { data: landMembers, refetch: refetchLandMembers } = useQuery({
  queryKey: ['landMembers', landId],
  queryFn: async () => {
    if (!landId.value) {
      throw new Error('missing.land_id');
    }

    const response = await api.LandMember.landMemberGetCollection({
      land: landId.value,
    });

    return response.data;
  },
  enabled,
});

const { on: onLandMemberPatch } = useEventBus(landMemberPatchSucceededEvent);
const { on: onLandMemberDelete } = useEventBus(landMemberDeleteSucceededEvent);

onLandMemberPatch(() => {
  refetchLandMembers();
});

onLandMemberDelete(() => {
  refetchLandMembers();
});
</script>
