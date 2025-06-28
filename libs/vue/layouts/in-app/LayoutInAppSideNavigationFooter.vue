<template>
  <div
    class="flex gap-2"
    :class="navigationExpanded ? 'flex-row justify-between' : 'flex-col'"
  >
    <slot>
      <Tooltip>
        <TooltipTrigger as-child>
          <Button
            icon-only
            size="xs"
            variant="ghost"
          >
            <template #icon>
              <IconGear />
            </template>
          </Button>
        </TooltipTrigger>
        <TooltipContent
          side="right"
          :side-offset="20"
        >
          Paramètres
        </TooltipContent>
      </Tooltip>
      <Tooltip>
        <TooltipTrigger as-child>
          <Button
            icon-only
            size="xs"
            variant="ghost"
          >
            <template #icon>
              <IconCircleQuestion />
            </template>
          </Button>
        </TooltipTrigger>
        <TooltipContent
          side="right"
          :side-offset="20"
        >
          Assistance
        </TooltipContent>
      </Tooltip>
    </slot>
  </div>
</template>

<script lang="ts" setup>
import { inject } from 'vue';
import { INJECTION_KEY_NAVIGATION_EXPANDED } from '.';
import Button from '@lychen/vue-components-core/button/Button.vue';
import IconGear from '@lychen/vue-icons/IconGear.vue';
import IconCircleQuestion from '@lychen/vue-icons/IconCircleQuestion.vue';
import { Tooltip, TooltipContent, TooltipTrigger } from '@lychen/vue-components-core/tooltip';

const navigationExpanded = inject(INJECTION_KEY_NAVIGATION_EXPANDED);
</script>
