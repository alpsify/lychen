import type { Iri } from './Iri';
import { type Resource } from './Resource';
import { type Search } from './Search';
import { type View } from './View';

export type Collection<T extends Resource> = CollectionOfNonResource<T>;

export interface CollectionOfNonResource<T> {
  '@id': string;
  '@type': 'Collection';
  '@context': string;
  totalItems: number;
  member: T[];
  search: Search;
  view: View;
}

export function instanceOfCollection<T extends Resource>(object: unknown): object is Collection<T> {
  if (!object || typeof object !== 'object') {
    return false;
  }
  return 'member' in object;
}
