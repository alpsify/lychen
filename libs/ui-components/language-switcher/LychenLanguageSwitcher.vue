<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import { LychenPopover, LychenPopoverContent, LychenPopoverTrigger } from '../popover';
import LychenIcon from '../icon/LychenIcon.vue';
import LychenRadioGroup from '../radio-group/LychenRadioGroup.vue';
import LychenRadioGroupItem from '../radio-group/LychenRadioGroupItem.vue';

const { locale } = useI18n();
</script>

<template>
  <LychenPopover>
    <LychenPopoverTrigger as-child>
      <LychenIcon
        icon="language"
        class="cursor-pointer"
      />
    </LychenPopoverTrigger>
    <LychenPopoverContent
      class="w-auto"
      side="top"
      :side-offset="30"
    >
      <LychenRadioGroup
        v-model="locale"
        :orientation="'vertical'"
      >
        <div class="flex items-center space-x-2">
          <LychenRadioGroupItem
            id="r1"
            value="fr-FR"
          />
          <Label for="r1">Français</Label>
        </div>
        <div class="flex items-center space-x-2">
          <LychenRadioGroupItem
            id="r2"
            value="en-US"
          />
          <Label for="r2">English</Label>
        </div>
      </LychenRadioGroup>
    </LychenPopoverContent>
  </LychenPopover>
</template>
