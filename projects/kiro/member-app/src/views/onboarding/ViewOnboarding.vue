<template>
  <div class="onboarding h-dvh p-6">
    <div class="flex flex-row justify-between">
      <div class="progress flex flex-row items-center gap-1">
        <div
          v-for="index in 3"
          :key="index"
          class="step rounded-full"
          :class="{ active: step === index - 1 }"
          @click="step = index - 1"
        />
      </div>
      <div
        v-if="step < 2"
        class="text-secondary flex items-center justify-end gap-2"
      >
        <small @click="step = 2">{{ t('skip') }} </small>
        <!--<FontAwesomeIcon :icon="['fal', 'chevron-right']" />-->
      </div>
    </div>
    <Transition
      name="slide-fade"
      mode="out-in"
    >
      <div
        :key="step"
        class="flex flex-col items-center justify-center gap-4 text-center"
      >
        <h2 class="font-poppins text-surface-on text-3xl font-bold">
          {{ t(`step.${step}.title`) }}
        </h2>
        <p class="text-surface-on/80 text-sm">
          {{ t(`step.${step}.paragraph`) }}
        </p>
        <img :src="imgSrc" />
      </div>
    </Transition>
    <div class="flex flex-col gap-4">
      <template v-if="step < 2">
        <LychenButton @click="step++">
          {{ t(`continue`) }}
        </LychenButton>
      </template>
      <template v-else>
        <LychenTooltip :content="t('register_tooltip')">
          <LychenButton @click.prevent="$zitadel.oidcAuth.signIn({ prompt: 'create' })">
            {{ t('register') }}
          </LychenButton>
        </LychenTooltip>
        <LychenButton
          class="text-secondary"
          variant="ghost"
          @click.prevent="$zitadel.oidcAuth.signIn"
        >
          {{ t('login') }}
        </LychenButton>
      </template>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { computed, defineAsyncComponent, ref } from 'vue';

import { useTranslations } from './i18n';

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);
const LychenTooltip = defineAsyncComponent(
  () => import('@lychen/ui-components/tooltip/LychenTooltip.vue'),
);

const step = ref(0);

const imgSrc = computed(() => {
  return new URL(`./assets/images/graphic-${step.value}.png`, import.meta.url).href;
});

const { t } = useTranslations();
</script>

<style scoped>
.onboarding {
  background: var(--linear-gradient-surface-to-surface-container-highest);
  display: grid;
  grid-template-rows: 30px 1fr auto;

  .progress {
    cursor: pointer;

    .step {
      background: theme('colors.secondary.DEFAULT');
      height: 8px;
      transition: width 500ms ease-in-out;
    }

    .step.active {
      width: 30px;
    }

    .step:not(.active) {
      width: 12px;
      background: theme('colors.secondary.DEFAULT' / 50%);
    }
  }
}

.slide-fade-enter-active {
  transition: all 0.3s ease;
}

.slide-fade-leave-active {
  transition: all 500ms cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(-10px);
  opacity: 0;
}
</style>
