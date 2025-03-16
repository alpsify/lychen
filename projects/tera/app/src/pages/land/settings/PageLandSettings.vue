<template>
  <SectionWithTitle title="Règlages">
    <p v-if="land">Règlages pour l'espace de culture {{ land.name }}</p>
    <Tabs default-value="general">
      <TabsList class="grid w-full grid-cols-4">
        <TabsTrigger value="general"> Générale </TabsTrigger>
        <TabsTrigger value="subscription"> Abonnement </TabsTrigger>
        <TabsTrigger value="notifications"> Notifications </TabsTrigger>
        <TabsTrigger value="team"> Equipe </TabsTrigger>
      </TabsList>
      <TabsContent value="general"> </TabsContent>
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

const land = inject(INJECT_LAND_KEY);
</script>

<style lang="css" scoped></style>
