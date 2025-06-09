<template>
  <div
    :data-pw="association.uuid"
    class="bg-surface-container text-on-surface-container rounded-xl p-4"
  >
    <h3 class="font-bold">
      {{ association.name }}
      {{ association.description }}
    </h3>
    <div class="flex gap-4">
      <span>4 <Icon :icon="faUser" /></span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { faUser } from '@fortawesome/pro-light-svg-icons/faUser';

import { Props } from '.';

defineProps<Props>();

const Icon = defineAsyncComponent(() => import('@lychen/vue-components-core/icon/Icon.vue'));
</script>
