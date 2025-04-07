<template>
  <section class="flex flex-col">
    <Tabs default-value="list">
      <TabsList class="flex flex-row justify-between md:justify-start">
        <TabsTrigger value="list"><Icon :icon="faListUl" /> Liste </TabsTrigger>
        <TabsTrigger value="kanban"><Icon :icon="faChartKanban" /> Tableau </TabsTrigger>
        <TabsTrigger value="gantt"><Icon :icon="faArrowProgress" /> Gantt </TabsTrigger>
      </TabsList>

      <TabsContent
        value="list"
        class="flex flex-col gap-6"
      >
        <template
          v-for="(state, index) in states"
          :key="index"
        >
          <template v-if="tasksQueries[index]?.data?.member">
            <DataTableTeraLandTask
              :data="tasksQueries[index].data.member"
              :state="state"
              :total-items="tasksQueries[index]?.data?.totalItems"
            />
          </template>
        </template>
      </TabsContent>
      <TabsContent value="kanban">
        <Kanban class="flex flex-col md:grid md:grid-cols-3 gap-4">
          <KanbanColumn
            v-for="(state, index) in states"
            :key="state"
            :state="state"
            :total-items="tasksQueries[index]?.data?.totalItems"
          >
            <template #state>
              <BadgeTeraLandTaskState :state />
            </template>
            <template
              v-if="state === LandTaskState.to_be_done"
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
      <TabsContent value="gantt">
        <SectionDevelopmentInProgress />
        <!--<Gantt
          :tasks="[
            { id: 1, name: 'Task A', start: '2025-03-01', end: '2025-03-05' },
            { id: 2, name: 'Task B', start: '2025-03-03', end: '2025-03-10' },
          ]"
        />-->
      </TabsContent>
    </Tabs>
  </section>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import CardTeraLandTask from '@lychen/tera-ui-components/land-task/card/CardTeraLandTask.vue';
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import Kanban from '@lychen/vue-ui-components-extra/kanban/Kanban.vue';
import KanbanColumn from '@lychen/vue-ui-components-extra/kanban/KanbanColumn.vue';
import { useQueries } from '@tanstack/vue-query';
import { computed, inject } from 'vue';
import KanbanItem from '@lychen/vue-ui-components-extra/kanban/KanbanItem.vue';
import { Tabs, TabsList, TabsTrigger } from '@lychen/vue-ui-components-core/tabs';
import TabsContent from '@lychen/vue-ui-components-core/tabs/TabsContent.vue';
import { faChartKanban } from '@fortawesome/pro-light-svg-icons/faChartKanban';
import { Icon } from '@lychen/vue-ui-components-core/icon';
import { faListUl } from '@fortawesome/pro-light-svg-icons/faListUl';
import { faArrowProgress } from '@fortawesome/pro-light-svg-icons/faArrowProgress';
import DataTableTeraLandTask from '@lychen/tera-ui-components/land-task/data-table/DataTableTeraLandTask.vue';
import BadgeTeraLandTaskState from '@lychen/tera-ui-components/land-task/badges/state/BadgeTeraLandTaskState.vue';
//import Gantt from '@lychen/vue-ui-components-extra/gantt/Gantt.vue';
import {
  LandTaskState,
  PathsApiLand_rolesGetParametersQueryOrderPosition,
} from '@lychen/tera-util-api-sdk/generated/tera-api';
import SectionDevelopmentInProgress from '@lychen/vue-ui-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';

const land = inject(INJECT_LAND_KEY);

const landId = computed(() => land?.value?.['@id']);
const enabled = computed(() => !!landId.value);

const { api } = useTeraApi();

const states = computed(() => Object.values(LandTaskState));

const queries = computed(() =>
  states.value.map((state) => {
    return {
      queryKey: ['landTasks', state, landId],
      queryFn: async () => {
        const response = await api.GET('/api/land_tasks', {
          params: {
            query: {
              land: landId.value!,
              'order[dueDate]': PathsApiLand_rolesGetParametersQueryOrderPosition.asc,
              state: state,
            },
          },
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
