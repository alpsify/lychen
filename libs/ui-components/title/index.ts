import { cva, VariantProps } from "class-variance-authority";

export { default as LychenTitle } from "./LychenTitle.vue";

export interface Props {
  text: string;
}

export const titleVariants = cva(" antialiased text-balance font-inter", {
  variants: {
    variant: {
      default: "text-base",
      h1: "text-5xl lg:text-7xl font-extrabold",
      h2: "text-3xl lg:text-5xl font-bold",
      h3: "text-2xl lg:text-4xl font-bold",
      h4: "text-xl lg:text-3xl font-bold",
      h5: "lg:text-2xl font-bold",
      h6: "lg:text-xl font-bold",
    },
  },
  defaultVariants: {
    variant: "default",
  },
});

export type TitleVariants = VariantProps<typeof titleVariants>;
