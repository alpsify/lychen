<template>
  <div class="flex flex-row gap-4">
    <DropdownMenu>
      <DropdownMenuTrigger as-child>
        <Button
          variant="ghost"
          class="ml-auto"
          size="sm"
        >
          Interaction
          <Icon
            :icon="faChevronDown"
            class="ml-2 h-4 w-4"
          />
        </Button>
      </DropdownMenuTrigger>
      <DropdownMenuContent align="end">
        <DropdownMenuCheckboxItem
          v-for="column in table.getAllColumns().filter((column) => column.getCanHide())"
          :key="column.id"
          class="capitalize"
          :model-value="column.getIsVisible()"
          @update:model-value="
            (value) => {
              column.toggleVisibility(!!value);
            }
          "
        >
          {{ column.id }}
        </DropdownMenuCheckboxItem>
      </DropdownMenuContent>
    </DropdownMenu>
  </div>
  <div
    v-if="table.getRowModel().rows.length"
    class="flex flex-col gap-4"
  >
    <div
      v-for="row in table.getRowModel().rows"
      :key="row.id"
    >
      <DialogTeraLandProposalView
        :key="row.original.ulid"
        :title="row.original.title"
        :description="row.original.description"
        :sharing-conditions="row.original.sharingConditions"
      >
        <CardTeraLandProposal
          :title="row.original.title"
          :land-name="row.original.land?.name"
          :land-altitude="row.original.land?.altitude"
          :land-surface="row.original.land?.surface"
          :land-city="row.original.land?.address?.city"
          :expiration-date="row.original.expirationDate"
          :sharing-conditions="row.original.sharingConditions"
          :preferred-garden-interaction-mode="row.original.preferredGardenInteractionMode"
        />
      </DialogTeraLandProposalView>
    </div>
  </div>

  <div v-else>
    <!-- Optional: Show a message when there's no data -->
    No land proposals found.
  </div>
</template>

<script setup lang="ts">
import { useTeraApi } from '@lychen/tera-util-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import {
  useVueTable,
  createColumnHelper,
  getCoreRowModel,
  type ColumnDef,
} from '@tanstack/vue-table';
import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';
import DialogTeraLandProposalView from '@lychen/tera-ui-components/land-proposal/dialogs/view/DialogTeraLandProposalView.vue';
import { computed } from 'vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';
import { DropdownMenu } from '@lychen/vue-ui-components-core/dropdown-menu';
import DropdownMenuTrigger from '@lychen/vue-ui-components-core/dropdown-menu/DropdownMenuTrigger.vue';
import DropdownMenuContent from '@lychen/vue-ui-components-core/dropdown-menu/DropdownMenuContent.vue';
import DropdownMenuCheckboxItem from '@lychen/vue-ui-components-core/dropdown-menu/DropdownMenuCheckboxItem.vue';
import Icon from '@lychen/vue-ui-components-core/icon/Icon.vue';
import Button from '@lychen/vue-ui-components-core/button/Button.vue';

export type LandProposalPublicRead =
  components['schemas']['LandProposal.jsonld-land_proposal.collection-public'];

const { api } = useTeraApi();

const { data: queryData } = useQuery({
  queryKey: ['landProposalsPublic'],
  queryFn: async () => {
    const response = await api.GET('/api/land_proposals/public', {});
    return response.data;
  },
});

const landProposals = computed(() => queryData.value?.member || []);

const columnHelper = createColumnHelper<LandProposalPublicRead>();

// Define columns - even if you render a card, defining columns helps structure the data access
const columns = [
  columnHelper.accessor('title', { header: 'Title', enableSorting: true }),
  columnHelper.accessor((row) => row.land?.name, { id: 'landName', header: 'Land Name' }),
  columnHelper.accessor((row) => row.land?.address?.city, { id: 'city', header: 'City' }),
  columnHelper.accessor('preferredGardenInteractionMode', {
    id: 'preferredGardenInteractionMode',
    header: 'Interaction Mode',
  }),
];

const table = useVueTable({
  data: landProposals,
  columns,
  getCoreRowModel: getCoreRowModel(),
});
</script>
