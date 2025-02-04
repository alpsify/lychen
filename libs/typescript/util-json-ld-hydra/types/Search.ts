import type { Mapping } from './Mapping';

export interface Search {
  '@type': string;
  mapping?: Mapping[];
  template?: string;
  variableRepresentation?: string;
}
