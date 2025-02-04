import type { Iri } from '@lychen/typescript-util-json-ld-hydra/types/Iri';
import {
  instanceOfResource,
  type Resource,
} from '@lychen/typescript-util-json-ld-hydra/types/Resource';
import type { ObjectValues } from '@lychen/typescript-util-object/Object';

export interface Land extends Resource {
  '@type': 'Land';
  name: string;
  kind: LandKind;
  surface?: number;
  landAreas?: Iri[];
  landMembers?: Iri[];
  landRoles?: Iri[];
  landSetting?: Iri;
  landTasks?: Iri[];
}

export const LAND_KIND: { [key: string]: string } = {
  Individual: 'individual',
  SharedGarden: 'shared-garden',
  MarketGarden: 'market-garden',
} as const;

export type LandKind = ObjectValues<typeof LAND_KIND>;

export function instanceOfLand(object: unknown): object is Land {
  if (!instanceOfResource(object)) {
    return false;
  }

  return object['@type'] === 'Land';
}
