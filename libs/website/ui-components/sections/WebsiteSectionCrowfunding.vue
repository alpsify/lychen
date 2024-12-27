<template>
  <LychenContainer
    id="discover"
    class="flex flex-col md:flex-row gap-6 items-stretch md:items-center md:py-10"
  >
    <LychenIcon
      icon="bullhorn"
      class="fa-2xl"
    />
    <WebsiteBannerUlule />
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';
import WebsiteBannerUlule from '../banner/ulule/WebsiteBannerUlule.vue';

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
</script>
