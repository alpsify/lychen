<template>
  <section class="flex flex-col items-stretch h-full">
    <SectionDevelopmentInProgress title="Itinéraires de culture" />
  </section>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@lychen/tera-util-constants/InjectionKeys';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import SectionDevelopmentInProgress from '@lychen/vue-ui-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';
import { useQuery } from '@tanstack/vue-query';
import { computed, inject } from 'vue';

const land = inject(INJECT_LAND_KEY);

const landUlid = computed(() => land?.value?.ulid);
const enabled = computed(() => !!landUlid.value);

const { api } = useTeraApi();

const { data: landCultivationPlans } = useQuery({
  queryKey: ['landCultivationPlans', landUlid],
  queryFn: async () => {
    const response = await api.GET('/api/land_cultivation_plans', {
      params: {
        query: {
          land: landUlid.value!,
        },
      },
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
