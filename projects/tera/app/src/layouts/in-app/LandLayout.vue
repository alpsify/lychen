<template>
  <!--<Teleport
    defer
    to="#breadcrumb"
  >
  </Teleport>-->
  <RouterView />
</template>

<script lang="ts" setup>
import { RoutePageDashboard } from '@/pages/dashboard';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { provide, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { INJECT_LAND_KEY } from '.';
import { landPatchSucceededEvent } from '@lychen/tera-util-events/LandEvents';
import { useEventBus } from '@vueuse/core';

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
  () => refetch(),
);
</script>

<style lang="css" scoped></style>
