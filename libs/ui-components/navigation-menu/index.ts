import { cva } from 'class-variance-authority';

export { default as LychenNavigationMenu } from './LychenNavigationMenu.vue';
export { default as LychenNavigationMenuContent } from './LychenNavigationMenuContent.vue';
export { default as LychenNavigationMenuItem } from './LychenNavigationMenuItem.vue';
export { default as LychenNavigationMenuLink } from './LychenNavigationMenuLink.vue';
export { default as LychenNavigationMenuList } from './LychenNavigationMenuList.vue';
export { default as LychenNavigationMenuTrigger } from './LychenNavigationMenuTrigger.vue';

export const navigationMenuTriggerStyle = cva(
  'bg-background hover:bg-tertiary-container hover:text-tertiary-foreground focus:bg-tertiary focus:text-tertiary-foreground data-[active]:bg-tertiary/50 data-[state=open]:bg-tertiary/50 group inline-flex h-10 w-max items-center justify-center rounded-full px-4 py-2 text-sm font-bold transition-colors focus:outline-none disabled:pointer-events-none disabled:opacity-50',
);
