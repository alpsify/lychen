<template>
  <div class="z-50 flex h-[70px] w-full">
    <div
      class="relative backdrop text-on-surface-container container flex flex-row items-stretch gap-4 rounded-full px-6 py-2 shadow-lg"
    >
      <slot></slot>

      <div class="flex flex-row items-center lg:hidden">
        <Sheet
          v-model:open="isOpen"
          side="right"
        >
          <SheetTrigger as-child>
            <Icon
              icon="bars-staggered"
              class="cursor-pointer"
            />
          </SheetTrigger>
          <SheetContent
            class="bg-surface-container/70 text-on-surface-container w-full backdrop-blur-lg"
          >
            <template #header><slot name="header"></slot></template>
            <slot name="mobile"></slot>
          </SheetContent>
        </Sheet>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent, provide, ref } from 'vue';

const SheetTrigger = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/sheet/SheetTrigger.vue'),
);

const Sheet = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/sheet/Sheet.vue'));

const SheetContent = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/sheet/SheetContent.vue'),
);

const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));

const isOpen = ref<boolean>(false);

provide('mobileMenuIsOpen', isOpen);
</script>

<style scoped>
.backdrop::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  backdrop-filter: blur(var(--blur-lg));
  z-index: -1;
  background-color: rgba(var(--lychen-color-surface-container), 0.7);
  border-radius: calc(infinity * 1px);
}
</style>
