import { cva, type VariantProps } from 'class-variance-authority';

export { default as LychenSheet } from './LychenSheet.vue';
export { default as LychenSheetClose } from './LychenSheetClose.vue';
export { default as LychenSheetContent } from './LychenSheetContent.vue';
export { default as LychenSheetDescription } from './LychenSheetDescription.vue';
export { default as LychenSheetFooter } from './LychenSheetFooter.vue';
export { default as LychenSheetHeader } from './LychenSheetHeader.vue';
export { default as LychenSheetTitle } from './LychenSheetTitle.vue';
export { default as LychenSheetTrigger } from './LychenSheetTrigger.vue';

export const sheetVariants = cva(
  'bg-background data-[state=open]:animate-in data-[state=closed]:animate-out fixed z-50 gap-4 p-6 shadow-lg transition ease-in-out data-[state=closed]:duration-300 data-[state=open]:duration-500',
  {
    variants: {
      side: {
        top: 'data-[state=closed]:slide-out-to-top data-[state=open]:slide-in-from-top inset-x-0 top-0',
        bottom:
          'data-[state=closed]:slide-out-to-bottom data-[state=open]:slide-in-from-bottom inset-x-0 bottom-0',
        left: 'data-[state=closed]:slide-out-to-left data-[state=open]:slide-in-from-left inset-y-0 left-0  h-full w-3/4 sm:max-w-sm',
        right:
          'data-[state=closed]:slide-out-to-right data-[state=open]:slide-in-from-right inset-y-0 right-0 h-full w-3/4 sm:max-w-sm overflow-y-scroll',
      },
    },
    defaultVariants: {
      side: 'right',
    },
  },
);

export type LychenSheetVariants = VariantProps<typeof sheetVariants>;
