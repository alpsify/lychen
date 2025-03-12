<template>
  <SectionWithTitle title="Vos espaces de culture">
    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <div class="flex flex-row items-center gap-2">
          <Button
            :icon="faPlus"
            variant="secondary"
          />
          <Button
            :icon="faListUl"
            variant="container-high"
          />
        </div>
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
import CardTeraLand from '@lychen/tera-ui-components/card-tera-land/CardTeraLand.vue';
import { RoutePageLandDashboard } from '@pages/land/dashboard';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';

const api = useTeraApi('Land');

const { data: lands } = useQuery({
  queryKey: ['land'],
  queryFn: async () => {
    const response = await api.landGetCollection({});
    return response.data;
  },
});
</script>

<style lang="css" scoped></style>
