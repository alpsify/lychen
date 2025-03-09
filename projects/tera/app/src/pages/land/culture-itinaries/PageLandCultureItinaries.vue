<template>
  <section class="flex flex-col">
    <h1>Land Culture Itinaries</h1>
  </section>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { computed, inject } from 'vue';

const land = inject(INJECT_LAND_KEY);

const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const api = useTeraApi('LandCultivationPlan');

const { data: landCultivationPlans } = useQuery({
  queryKey: ['landCultivationPlans', landId],
  queryFn: async () => {
    const response = await api.landCultivationPlanGetCollection({
      land: landId.value!,
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
