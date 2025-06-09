<template>
  <Container
    id="discover"
    class="flex flex-col md:flex-row gap-6 items-stretch md:items-center md:py-10"
  >
    <Icon
      :icon="faBullhorn"
      class="fa-2xl"
    />
    <BannerUlule class="grow" />
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import Icon from '@lychen/vue-components-core/icon/Icon.vue';
import BannerUlule from '../banner-ulule/BannerUlule.vue';

import { faBullhorn } from '@fortawesome/pro-light-svg-icons/faBullhorn';

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);
</script>
