<template>
  <LychenContainer
    id="discover"
    class="flex flex-col md:flex-row gap-6 items-stretch md:items-center md:py-10"
  >
    <LychenIcon
      icon="bullhorn"
      class="fa-2xl"
    />
    <UluleBanner />
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';
import UluleBanner from '../banner/ulule-banner/UluleBanner.vue';

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
</script>
