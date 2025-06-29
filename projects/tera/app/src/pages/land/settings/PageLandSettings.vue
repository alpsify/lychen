<template>
  <SectionWithTitle :title="t('title')">
    <Tabs default-value="general">
      <TabsList class="grid w-full grid-cols-5">
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
        <TabsTrigger value="api">
          {{ t('tabs.api.title') }}
        </TabsTrigger>
      </TabsList>
      <TabsContent value="general">
        <PageLandSettingsGeneral />
      </TabsContent>
      <TabsContent value="subscription">
        <SectionDevelopmentInProgress />
      </TabsContent>
      <TabsContent value="notifications"> <SectionDevelopmentInProgress /></TabsContent>
      <TabsContent value="api"> <SectionDevelopmentInProgress /></TabsContent>
      <TabsContent value="team"> <PageLandSettingsTeam /> </TabsContent>
    </Tabs>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import SectionWithTitle from '@lychen/vue-components-app/section-with-title/SectionWithTitle.vue';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@lychen/vue-components-core/tabs';
import PageLandSettingsGeneral from './PageLandSettingsGeneral.vue';
import PageLandSettingsTeam from './PageLandSettingsTeam.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import SectionDevelopmentInProgress from '@lychen/vue-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});
</script>

<style lang="css" scoped></style>
