import type { ObjectValues } from '@lychen/typescript-util-object/Object';

export interface Props {
  id: string;
  fullName: string;
  photo: string;
  goals: string[];
  painPoints: string[];
  values: string[];
  age: number;
  location: string;
  jobTitle: string;
  biography: string;
  variant: Variant;
}

export const VARIANT = {
  Default: 'default',
  Small: 'small',
  OverImage: 'over-image',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
