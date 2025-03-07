<template>
  <section class="flex flex-col">
    <h1>Land Tasks</h1>
    <div class="flex flex-col gap-4">
      <div class="flex flex-row justify-between items-center">
        <Title variant="h4">Vos tâches</Title>
        <div class="flex flex-row gap-2">
          <Button
            :icon="faPlus"
            variant="container-high"
          />
          <Button
            :icon="faListUl"
            variant="container-high"
          />
        </div>
      </div>
      <div
        v-if="landTasks"
        class="flex flex-col gap-2"
      >
        <CardTeraLandTask
          v-for="landTask in landTasks.member"
          :key="landTask.ulid"
          :land-task="landTask"
        />
      </div>
    </div>
  </section>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import CardTeraLandTask from '@lychen/tera-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { OrderDueDateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { useQuery } from '@tanstack/vue-query';
import { computed, inject } from 'vue';

const land = inject(INJECT_LAND_KEY);

const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const api = useTeraApi('LandTask');

const { data: landTasks } = useQuery({
  queryKey: ['landTasks', landId],
  queryFn: async () => {
    const response = await api.landTaskGetCollection({
      land: landId.value!,
      'order[dueDate]': OrderDueDateEnum.Asc,
    });

    return response.data;
  },
  enabled,
});
</script>

<style lang="css" scoped></style>
