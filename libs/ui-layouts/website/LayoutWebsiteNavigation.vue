<template>
  <div class="z-50 flex h-[70px] w-full">
    <div
      class="relative backdrop text-surface-container-on container flex flex-row items-stretch gap-4 rounded-full px-6 py-2 shadow-lg"
    >
      <slot></slot>

      <div class="flex flex-row items-center lg:hidden">
        <LychenSheet
          v-model:open="isOpen"
          side="right"
        >
          <LychenSheetTrigger as-child>
            <LychenIcon
              icon="bars-staggered"
              class="cursor-pointer"
            />
          </LychenSheetTrigger>
          <LychenSheetContent
            class="bg-surface-container/70 text-surface-container-on w-full backdrop-blur-lg"
            @click="closeDialog"
          >
            <slot name="mobile"></slot>
          </LychenSheetContent>
        </LychenSheet>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { LychenSheetTrigger } from '@lychen/ui-components/sheet';
import { defineAsyncComponent, ref } from 'vue';

const LychenSheet = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheet.vue'),
);

const LychenSheetContent = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheetContent.vue'),
);

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const isOpen = ref(false);

function closeDialog() {
  isOpen.value = false;
}
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
  backdrop-filter: blur(theme('backdropBlur.lg'));
  z-index: -1;
  background-color: rgb(var(--color-surface-container) / 0.7);
  border-radius: theme('borderRadius.full');
}
</style>
