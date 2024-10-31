import { cva } from 'class-variance-authority';

export { default as LychenNavigationMenu } from './LychenNavigationMenu.vue';
export { default as LychenNavigationMenuContent } from './LychenNavigationMenuContent.vue';
export { default as LychenNavigationMenuItem } from './LychenNavigationMenuItem.vue';
export { default as LychenNavigationMenuLink } from './LychenNavigationMenuLink.vue';
export { default as LychenNavigationMenuList } from './LychenNavigationMenuList.vue';
export { default as LychenNavigationMenuTrigger } from './LychenNavigationMenuTrigger.vue';

export const navigationMenuTriggerStyle = cva(
  'group inline-flex h-10 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50',
);
