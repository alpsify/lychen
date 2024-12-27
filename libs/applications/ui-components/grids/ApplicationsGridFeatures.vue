<template>
  <div class="grid grid-cols-1 grid-rows-auto md:grid-cols-fluid md:grid-rows-1 gap-10">
    <div
      v-for="(group, index) in features"
      :key="index"
    >
      <p class="text-xl opacity-60 uppercase">{{ group.title }}</p>
      <ApplicationFeatureCard
        v-for="feature in group.features"
        v-bind="feature"
        :key="feature.alias"
        class="pl-0"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { OrganizedFeaturesByGroup } from '@lychen/applications-util-model/OrganizedFeaturesByGroup';
import ApplicationFeatureCard from '../ApplicationFeatureCard.vue';

defineProps<{ features: OrganizedFeaturesByGroup }>();
</script>
