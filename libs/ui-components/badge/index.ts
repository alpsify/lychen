import { cva, type VariantProps } from 'class-variance-authority';

export { default as LychenBadge } from './LychenBadge.vue';

export const badgeVariants = cva(
	'inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2',
	{
		variants: {
			variant: {
				primary: 'border-transparent bg-primary text-primary-on hover:bg-primary/80',
				secondary: 'border-transparent bg-secondary text-secondary-on hover:bg-secondary/80',
				tertiary: 'border-transparent bg-tertiary text-tertiary-on hover:bg-tertiary/80',
				negative: 'border-transparent bg-negative text-negative-on hover:bg-negative/80',
				positive: 'border-transparent bg-positive text-positive-on hover:bg-positive/80',
				outline: 'text-surface-on',
			},
		},
		defaultVariants: {
			variant: 'primary',
		},
	},
);

export type LychenBadgeVariants = VariantProps<typeof badgeVariants>;
