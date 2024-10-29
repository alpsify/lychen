<template>
  <nav class="z-50 w-full flex">
    <div
      class="container flex flex-row items-center backdrop-blur-md bg-surface-container/50 text-surface-container-on px-4 py-2 shadow-sm rounded-lg gap-4">
      <slot></slot>

      <div class="lg:hidden flex flex-row items-center">
        <LychenSheet side="right">
          <LychenSheetTrigger as-child>
            <LychenIcon
              icon="bars-staggered"
              class="cursor-pointer"/>
          </LychenSheetTrigger>
          <LychenSheetContent class="w-full backdrop-blur-md bg-surface-container/50 text-surface-container-on">
            <slot name="mobile"></slot>
          </LychenSheetContent>
        </LychenSheet>
      </div>
    </div>
  </nav>
</template>

<script lang="ts" setup>
import {LychenSheetTrigger} from '@lychen/ui-components/sheet';
import {defineAsyncComponent} from 'vue';

const LychenSheet = defineAsyncComponent(() => import('@lychen/ui-components/sheet/LychenSheet.vue'));

const LychenSheetContent = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheetContent.vue'),
);

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));
</script>

<style lang="css" scoped>
nav {
  height: 70px;
}
</style>
