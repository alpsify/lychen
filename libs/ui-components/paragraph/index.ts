import { cva, VariantProps } from 'class-variance-authority';

export { default as LychenParagraph } from './LychenParagraph.vue';

export interface Props {
	text: string;
}

export const paragraphVariants = cva('text-balance', {
	variants: {
		variant: {
			default: 'text-base leading-4',
			'website-default': 'text-base tracking-tight leading-6 font-semibold',
		},
	},
	defaultVariants: {
		variant: 'default',
	},
});

export type ParagraphVariants = VariantProps<typeof paragraphVariants>;
