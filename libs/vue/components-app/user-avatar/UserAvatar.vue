<template>
  <Popover>
    <PopoverTrigger as-child>
      <Avatar class="cursor-pointer">
        <AvatarFallback> NC </AvatarFallback>
      </Avatar>
    </PopoverTrigger>
    <PopoverContent class="flex flex-col gap-4 items-center p-8">
      <div class="flex flex-col gap-0 items-center">
        <small>{{ user.email }}</small>
        <small class="opacity-50">Géré par Swiss Steel</small>
      </div>
      <div class="flex flex-col items-center gap-2">
        <Avatar
          class="cursor-pointer"
          size="lg"
        >
          <AvatarFallback> NC </AvatarFallback>
        </Avatar>
        <h2 class="text-lg font-medium">{{ user.fullname }}</h2>
        <Button
          label="Gérez votre compte"
          variant="outline"
          size="sm"
        />
      </div>
      <div class="flex flex-row justify-between text-xs items-center self-stretch">
        <a class="opacity-90"><IconRightFromBracket class="mr-2" /> Se déconnecter </a>
        <div class="flex flex-row gap-2">
          <SelectLanguage />
          <ToggleColorScheme />
        </div>
      </div>
    </PopoverContent>
  </Popover>
</template>

<script setup lang="ts">
import { Avatar, AvatarFallback } from '@lychen/vue-components-core/avatar';
import { Popover, PopoverContent, PopoverTrigger } from '@lychen/vue-components-core/popover';
import ToggleColorScheme from '@lychen/vue-color-scheme/components/ToggleColorScheme.vue';
import SelectLanguage from '@lychen/vue-i18n/components/select-language/SelectLanguage.vue';
import Button from '@lychen/vue-components-core/button/Button.vue';
import IconRightFromBracket from '@lychen/vue-icons/IconRightFromBracket.vue';

const user = {
  email: 'Nadege.CrepelProvost@lychengroup.com',
  fullname: 'Nadège Crepel',
  role: '',
};
</script>
