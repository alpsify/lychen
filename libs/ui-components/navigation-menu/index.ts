import { cva } from 'class-variance-authority';

export const navigationMenuTriggerStyle = cva(
  'data-[active]:bg-tertiary/50 data-[state=open]:bg-tertiary/10 group inline-flex h-10 w-max items-center justify-center rounded-full px-4 py-2 text-sm font-bold transition-colors focus:outline-none disabled:pointer-events-none disabled:opacity-50',
);

export const EVENT_NavigateToRoute = 'navigateToRoute';
