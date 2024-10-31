<template>
  <nav class="z-50 flex w-full">
    <div
      class="bg-surface-container/50 text-surface-container-on container flex flex-row items-center gap-4 rounded-lg px-4 py-2 shadow-sm backdrop-blur-md"
    >
      <slot></slot>

      <div class="flex flex-row items-center lg:hidden">
        <LychenSheet side="right">
          <LychenSheetTrigger as-child>
            <LychenIcon
              icon="bars-staggered"
              class="cursor-pointer"
            />
          </LychenSheetTrigger>
          <LychenSheetContent
            class="bg-surface-container/50 text-surface-container-on w-full backdrop-blur-md"
          >
            <slot name="mobile"></slot>
          </LychenSheetContent>
        </LychenSheet>
      </div>
    </div>
  </nav>
</template>

<script lang="ts" setup>
import { LychenSheetTrigger } from '@lychen/ui-components/sheet';
import { defineAsyncComponent } from 'vue';

const LychenSheet = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheet.vue'),
);

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
