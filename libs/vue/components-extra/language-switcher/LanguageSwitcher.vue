<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-components-core/popover';
import RadioGroup from '@lychen/vue-components-core/radio-group/RadioGroup.vue';
import RadioGroupItem from '@lychen/vue-components-core/radio-group/RadioGroupItem.vue';
import Icon from '@lychen/vue-components-core/icon/Icon.vue';
import { faGlobe } from '@fortawesome/pro-light-svg-icons/faGlobe';

const { locale } = useI18n();
</script>

<template>
  <Popover>
    <PopoverTrigger as-child>
      <Icon
        :icon="faGlobe"
        class="cursor-pointer"
        aria-label="Select language"
      />
    </PopoverTrigger>
    <PopoverContent
      class="w-auto"
      side="top"
      :side-offset="30"
    >
      <RadioGroup
        v-model="locale"
        :orientation="'vertical'"
        aria-label="Select language"
      >
        <div class="flex items-center space-x-2">
          <RadioGroupItem
            id="r1"
            value="fr-FR"
          />
          <label for="r1">Français</label>
        </div>
        <div class="flex items-center space-x-2">
          <RadioGroupItem
            id="r2"
            value="en-US"
          />
          <label for="r2">English</label>
        </div>
      </RadioGroup>
    </PopoverContent>
  </Popover>
</template>
