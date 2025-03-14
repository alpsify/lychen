<template>
  <footer class="container p-4">
    <div class="bg-surface-container-low flex flex-col rounded-xl p-6">
      <div class="flex flex-col gap-4">
        <div class="flex flex-col items-stretch justify-between gap-4 lg:flex-row">
          <div class="flex basis-1/3 flex-col gap-2">
            <div class="flex flex-row items-end gap-1 justify-start">
              <ApplicationTitle
                :value="applicationName"
                class="text-2xl"
              />
            </div>
            <slot name="underLogo" />
          </div>

          <div class="flex basis-1/4 flex-col justify-center gap-2 text-sm">
            <LogoLychenFull class="h-8" />
            <p class="font-medium">{{ EMAIL.Bonjour }}</p>
            <p>
              Made with ❤️ by
              <a
                class="underline"
                :href="LINK.Alpsify"
                >@alpsify</a
              >
              and
              <a
                class="underline"
                :href="LINK.HumusAndCo"
                >@humusandco</a
              >
            </p>
          </div>
        </div>

        <div class="flex flex-col-reverse items-center justify-between gap-4 lg:flex-row">
          <small class="text-xs">{{ tGlobal(`lychen.copyright`) }}</small>
          <ul class="flex flex-row gap-2 text-xs opacity-60">
            <li
              v-for="(menu, _index) in legalMenus"
              :key="_index"
            >
              {{ menu.title }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';
import { type LayoutWebsiteApplicationFooterProps } from '.';
import { EMAIL } from '@lychen/typescript-util-constants/Email';
import { LINK } from '@lychen/typescript-util-constants/Link';
import {
  messages as globalMessages,
  TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY,
} from '@lychen/ui-i18n/global';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const ApplicationTitle = defineAsyncComponent(
  () => import('@lychen/applications-ui-components/ApplicationTitle.vue'),
);

const LogoLychenFull = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/logo-lychen/LogoLychenFull.vue'),
);

const { t: tGlobal } = useI18nExtended({
  messages: globalMessages,
  rootKey: GLOBAL_TRANSLATION_KEY,
  prefixed: true,
});

const legalMenus = [
  { title: "Conditions générales d'utilisation" },
  { title: 'Protection des données' },
  { title: 'Mentions légales' },
];

defineProps<LayoutWebsiteApplicationFooterProps>();
</script>
