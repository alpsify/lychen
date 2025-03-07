<template>
  <Teleport
    defer
    to="#breadcrumb"
  >
  </Teleport>
  <RouterView />
</template>

<script lang="ts" setup>
import { RoutePageDashboard } from '@/pages/dashboard';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { provide } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { INJECT_LAND_KEY } from '.';

const route = useRoute();
const router = useRouter();
const api = useTeraApi('Land');

const { data: land } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    try {
      const response = await api.landGet(<string>route.params.landUlid);
      return response.data;
    } catch {
      return Promise.reject(router.push(RoutePageDashboard));
    }
  },
  enabled: !!route.params.landUlid,
});

provide(INJECT_LAND_KEY, land);
</script>

<style lang="css" scoped></style>
