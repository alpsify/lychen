<template>
  <LayoutInAppRoot>
    <LayoutInAppSideNavigation class="flex flex-col justify-between">
      <LayoutInAppSideNavigationButtonExpand />
      <LayoutInAppSideNavigationHeaderApp name="tera" />
      <div class="flex flex-col gap-4">
        <LayoutInAppSideNavigationItem v-bind="dashboardItem" />
        <LayoutInAppSideNavigationSection>
          <template #header>
            <div
              :class="navigationExpanded ? 'flex flex-row justify-between gap-2 items-center' : ''"
            >
              <LayoutInAppSideNavigationSectionLabel :label="landSection.label" />
              <div
                v-if="navigationExpanded"
                class="flex flex-row gap-2 justify-end items-center"
              >
                <RouterLink :to="RoutePageLands">
                  <Button
                    variant="ghost"
                    size="xs"
                    :icon="faListUl"
                  ></Button>
                </RouterLink>
                <DialogTeraLandCreate v-model:open="open">
                  <Button
                    variant="ghost"
                    size="xs"
                    :icon="faPlus"
                  ></Button>
                </DialogTeraLandCreate>
              </div>
            </div>
          </template>
          <LayoutInAppSideNavigationItem
            v-for="(item, indexItems) in landSection.items"
            :key="indexItems"
            :to="{ name: item.to.name, params: { landUlid: land.ulid } }"
            :icon="item.icon"
            :label="item.label"
          />
        </LayoutInAppSideNavigationSection>
        <LayoutInAppSideNavigationSection
          v-for="(section, indexSections) in navigation"
          :key="indexSections"
          :label="section.label"
        >
          <template v-if="section.items">
            <LayoutInAppSideNavigationItem
              v-for="(item, indexItems) in section.items"
              :key="indexItems"
              v-bind="item"
            />
          </template>
        </LayoutInAppSideNavigationSection>
      </div>
      <LayoutInAppSideNavigationFooter />
    </LayoutInAppSideNavigation>
    <LayoutInAppContent />
    <LayoutInAppHeader class="justify-between gap-2">
      <div></div>
      <div class="flex flex-row gap-2 items-center justify-end">
        <AppMenu />
        <UserAvatar />
      </div>
    </LayoutInAppHeader>
  </LayoutInAppRoot>
</template>

<script setup lang="ts">
import { faListUl, faPlus } from '@fortawesome/pro-light-svg-icons';
import Button from '@lychen/vue-components-core/button/Button.vue';
import { useTeraApi } from '@lychen/tera-api-sdk/composables/useTeraApi';
import { useQuery } from '@tanstack/vue-query';
import { useEventBus } from '@vueuse/core';
import {
  landDeleteSucceededEvent,
  landPostSucceededEvent,
  landPatchSucceededEvent,
} from '@lychen/tera-events/LandEvents';
import { landMemberInvitationAcceptSucceededEvent } from '@lychen/tera-events/LandMemberInvitationEvents';
import DialogTeraLandCreate from '@lychen/tera-components/land/dialogs/create/DialogTeraLandCreate.vue';
import { inject, ref } from 'vue';
import { landMemberLeaveSucceededEvent } from '@lychen/tera-events/LandMemberEvents';
import {
  INJECTION_KEY_NAVIGATION_EXPANDED,
  LayoutInAppContent,
  LayoutInAppHeader,
  LayoutInAppRoot,
  LayoutInAppSideNavigation,
  LayoutInAppSideNavigationButtonExpand,
  LayoutInAppSideNavigationFooter,
  LayoutInAppSideNavigationHeaderApp,
  LayoutInAppSideNavigationItem,
  LayoutInAppSideNavigationSection,
} from '@lychen/vue-layouts/in-app';
import useMenus from '@/layouts/in-app/useMenus';
import { RoutePageLands } from '@/pages/lands';
import LayoutInAppSideNavigationSectionLabel from '@lychen/vue-layouts/in-app/LayoutInAppSideNavigationSectionLabel.vue';

const navigationExpanded = inject(INJECTION_KEY_NAVIGATION_EXPANDED);

const open = ref(false);

const { menus: navigation, landSection, dashboardItem } = useMenus();
const land = ref({ ulid: 'kfdjglk' });

const { api } = useTeraApi();

const { data: lands, refetch } = useQuery({
  queryKey: ['lands-first-five'],
  queryFn: async () => {
    const response = await api.GET('/api/lands', {
      params: {
        query: {
          itemsPerPage: 5,
        },
      },
    });
    return response.data;
  },
});

const { on: onLandPost } = useEventBus(landPostSucceededEvent);

onLandPost(() => {
  refetch();
  open.value = false;
});

const { on: onLandDelete } = useEventBus(landDeleteSucceededEvent);

onLandDelete(() => {
  refetch();
});

const { on: onLandUpdate } = useEventBus(landPatchSucceededEvent);

onLandUpdate(() => {
  refetch();
});

const { on: onLandMemberInvitationAccept } = useEventBus(landMemberInvitationAcceptSucceededEvent);

onLandMemberInvitationAccept(() => {
  refetch();
});

const { on: onLeaveLand } = useEventBus(landMemberLeaveSucceededEvent);

onLeaveLand(() => {
  refetch();
});
</script>

<style scoped>
/*.menu-item.router-link-active {
  background-color: var(--color-surface);
}

.accordion-menu-item.router-link-active {
  :deep(button) {
    background-color: var(--color-surface);
  }
}*/
</style>
