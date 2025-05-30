<template>
  <Teleport
    defer
    to="#breadcrumb"
  >
    <BaseHeading
      v-if="land"
      variant="h3"
      >{{ land.name }}</BaseHeading
    >
  </Teleport>
  <RouterView />
</template>

<script lang="ts" setup>
import { RoutePageDashboard } from '@/pages/dashboard';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { computed, provide, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { INJECT_LAND_KEY, INJECT_LAND_MEMBER_KEY } from '@lychen/tera-util-constants/InjectKeys';
import { landPatchSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import { useEventBus } from '@vueuse/core';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';

const route = useRoute();
const router = useRouter();
const { api } = useTeraApi();

const { data: land, refetch } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    try {
      const response = await api.GET('/api/lands/{ulid}', {
        params: { path: { ulid: <string>route.params.landUlid } },
      });
      return response.data;
    } catch {
      router.push(RoutePageDashboard);
      return Promise.reject(new Error('Failed to fetch land data'));
    }
  },
  enabled: !!route.params.landUlid,
});

provide(INJECT_LAND_KEY, land);

const { on } = useEventBus(landPatchSucceededEvent);

on(() => {
  refetch();
});

watch(
  () => route.params.landUlid,
  () => {
    refetch();
  },
);

const landUlid = computed(() => land?.value?.ulid);
const enabled = computed(() => !!landUlid.value);

const { data: landMember } = useQuery({
  queryKey: ['landMember', landUlid],
  queryFn: async () => {
    if (!landUlid.value) {
      throw new Error('missing.ulid');
    }
    const response = await api.GET('/api/land_members/me', {
      params: { query: { land: landUlid.value } },
    });
    return response.data;
  },
  enabled,
});

provide(INJECT_LAND_MEMBER_KEY, landMember);
</script>

<style lang="css" scoped></style>
