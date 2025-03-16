<template>
  <SectionWithTitle title="Règlages">
    <p v-if="land">
      Règlages pour l'espace de culture <strong>{{ land.name }}</strong>
    </p>
    <Tabs default-value="general">
      <TabsList class="grid w-full grid-cols-4">
        <TabsTrigger value="general"> Générale </TabsTrigger>
        <TabsTrigger value="team"> Equipe </TabsTrigger>
        <TabsTrigger value="subscription"> Abonnement </TabsTrigger>
        <TabsTrigger value="notifications"> Notifications </TabsTrigger>
      </TabsList>
      <TabsContent value="general">
        <PageLandSettingsGeneral />
      </TabsContent>
      <TabsContent value="subscription"> </TabsContent>
      <TabsContent value="notifications"> </TabsContent>
      <TabsContent value="team"> </TabsContent>
    </Tabs>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import { INJECT_LAND_KEY } from '@/layouts/in-app';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@lychen/vue-ui-components-core/tabs';
import { inject } from 'vue';
import PageLandSettingsGeneral from './PageLandSettingsGeneral.vue';

const land = inject(INJECT_LAND_KEY);
</script>

<style lang="css" scoped></style>
