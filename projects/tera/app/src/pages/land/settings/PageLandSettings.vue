<template>
  <SectionWithTitle :title="t('title')">
    <Tabs default-value="general">
      <TabsList class="grid w-full grid-cols-4">
        <TabsTrigger value="general">
          {{ t('tabs.general.title') }}
        </TabsTrigger>
        <TabsTrigger value="team">
          {{ t('tabs.team.title') }}
        </TabsTrigger>
        <TabsTrigger value="subscription">
          {{ t('tabs.subscription.title') }}
        </TabsTrigger>
        <TabsTrigger value="notifications">
          {{ t('tabs.notifications.title') }}
        </TabsTrigger>
      </TabsList>
      <TabsContent value="general">
        <PageLandSettingsGeneral />
      </TabsContent>
      <TabsContent value="subscription">
        {{ t('tabs.subscription.content') }}
      </TabsContent>
      <TabsContent value="notifications">
        {{ t('tabs.notifications.content') }}
      </TabsContent>
      <TabsContent value="team"> {{ t('tabs.team.content') }} </TabsContent>
    </Tabs>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@lychen/vue-ui-components-core/tabs';
import { inject } from 'vue';
import PageLandSettingsGeneral from './PageLandSettingsGeneral.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});

const land = inject(INJECT_LAND_KEY);
</script>

<style lang="css" scoped></style>
