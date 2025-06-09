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
        class="flex items-center justify-end gap-2 text-secondary"
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
        <h2 class="font-poppins text-3xl font-bold text-on-surface">
          {{ t(`step.${step}.title`) }}
        </h2>
        <p class="text-sm text-on-surface/80">
          {{ t(`step.${step}.paragraph`) }}
        </p>
        <img :src="imgSrc" />
      </div>
    </Transition>
    <div class="flex flex-col gap-4">
      <template v-if="step < 2">
        <Button @click="step++">
          {{ t(`continue`) }}
        </Button>
      </template>
      <template v-else>
        <LychenTooltip :content="t('register_tooltip')">
          <Button @click.prevent="$zitadel.oidcAuth.signIn({ prompt: 'create' })">
            {{ t('register') }}
          </Button>
        </LychenTooltip>
        <Button
          class="text-secondary"
          variant="ghost"
          @click.prevent="$zitadel.oidcAuth.signIn"
        >
          {{ t('login') }}
        </Button>
      </template>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { computed, defineAsyncComponent, ref } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

const Button = defineAsyncComponent(() => import('@lychen/vue-components-core/button/Button.vue'));
const LychenTooltip = defineAsyncComponent(
  () => import('@lychen/vue-components-core/tooltip/LychenTooltip.vue'),
);

const step = ref(0);

const imgSrc = computed(() => {
  return new URL(`./assets/images/graphic-${step.value}.png`, import.meta.url).href;
});

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style scoped>
.onboarding {
  background: var(--linear-gradient-surface-to-surface-container-highest);
  display: grid;
  grid-template-rows: 30px 1fr auto;

  .progress {
    cursor: pointer;

    .step {
      background: var(--color-secondary);
      height: 8px;
      transition: width 500ms ease-in-out;
    }

    .step.active {
      width: 30px;
    }

    .step:not(.active) {
      width: 12px;
      background: rgba(var(--lychen-color-secondary), 50%);
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
