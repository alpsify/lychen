<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-2">
    <a
      href="https://tally.so/r/w5EYdZ"
      target="_blank"
    >
      <LychenButton
        variant="default"
        size="sm"
        class="gap-2"
        >{{ t(`navigation.preregister`) }} <LychenIcon icon="rocket-launch" /></LychenButton
    ></a>
    <div class="text-lg font-bold">
      <RouterLink
        :to="RoutePageHome"
        @click="closeMobileMenu"
        >{{ t(`navigation.home.title`) }}
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { RoutePageHome } from '@pages/home';
import { inject, type Ref } from 'vue';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const mobileMenuIsOpen = inject<Ref<boolean>>('mobileMenuIsOpen');

function closeMobileMenu() {
  mobileMenuIsOpen!.value = false;
}
</script>

<style lang="css" scoped></style>
