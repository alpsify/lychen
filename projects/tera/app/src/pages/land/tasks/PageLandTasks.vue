<template>
  <section class="flex flex-col">
    <Tabs default-value="kanban">
      <TabsList>
        <TabsTrigger value="list"> Liste </TabsTrigger>
        <TabsTrigger value="kanban"> Tableau </TabsTrigger>
        <TabsTrigger value="gantt"> Gantt </TabsTrigger>
      </TabsList>

      <TabsContent value="list"> </TabsContent>
      <TabsContent value="kanban">
        <Kanban>
          <KanbanColumn
            v-for="(state, index) in states"
            :key="state"
            :state="state"
            :total-items="tasksQueries[index]?.data?.totalItems"
          >
            <template
              v-if="state === 'to_be_done'"
              #actions
            >
              <Button
                :icon="faPlus"
                variant="container-high"
                size="xs"
              />
            </template>
            <template v-if="tasksQueries[index]?.data?.member">
              <KanbanItem
                v-for="landTask in tasksQueries[index].data.member"
                :key="landTask.ulid"
                :state="state"
              >
                <CardTeraLandTask
                  :land-task="landTask"
                  no-state
                />
              </KanbanItem>
            </template>
          </KanbanColumn>
        </Kanban>
      </TabsContent>
      <TabsContent value="gantt"> </TabsContent>
    </Tabs>
  </section>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import CardTeraLandTask from '@lychen/tera-ui-components/card-tera-land-task/CardTeraLandTask.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { OrderDueDateEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import Kanban from '@lychen/vue-ui-components-extra/kanban/Kanban.vue';
import KanbanColumn from '@lychen/vue-ui-components-extra/kanban/KanbanColumn.vue';
import { useQueries } from '@tanstack/vue-query';
import { computed, inject } from 'vue';
import KanbanItem from '@lychen/vue-ui-components-extra/kanban/KanbanItem.vue';
import { Tabs, TabsList, TabsTrigger } from '@lychen/vue-ui-components-core/tabs';
import TabsContent from '@lychen/vue-ui-components-core/tabs/TabsContent.vue';

const land = inject(INJECT_LAND_KEY);

const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const api = useTeraApi('LandTask');

const states = computed(() => ['to_be_done', 'in_progress', 'done']);

const queries = computed(() =>
  states.value.map((state) => {
    return {
      queryKey: ['landTasks', state, landId],
      queryFn: async () => {
        const response = await api.landTaskGetCollection({
          land: landId.value!,
          'order[dueDate]': OrderDueDateEnum.Asc,
          state: state,
        });

        return response.data;
      },
      enabled,
    };
  }),
);

const tasksQueries = useQueries({ queries: queries });
</script>

<style lang="css" scoped></style>
