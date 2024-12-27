<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-2">
    <ApplicationBadgeState :state="APP_STATE"></ApplicationBadgeState>
    <WebsiteButtonTallyPreregister />
    <div class="text-lg font-bold">
      <RouterLink
        :to="RoutePageHome"
        @click="closeMobileMenu"
        >{{ t(`navigation.home.title`) }}
      </RouterLink>
    </div>
    <div class="text-lg font-bold">
      <RouterLink
        to="#features"
        @click="closeMobileMenu"
        >{{ t(`navigation.features.title`) }}
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { RoutePageHome } from '@pages/home';
import { inject, type Ref } from 'vue';
import { APP_STATE } from '@lychen/tera-util-constants/App';
import WebsiteButtonTallyPreregister from '@lychen/website-ui-components/buttons/tally-preregister/WebsiteButtonTallyPreregister.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const mobileMenuIsOpen = inject<Ref<boolean>>('mobileMenuIsOpen');

function closeMobileMenu() {
  mobileMenuIsOpen!.value = false;
}
</script>
