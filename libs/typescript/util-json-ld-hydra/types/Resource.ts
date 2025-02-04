import type { Ulid } from './Ulid';

export interface Resource {
  '@id': string;
  '@type': string;
  ulid: Ulid;
}

export function instanceOfResource(object: unknown): object is Resource {
  if (!object || typeof object !== 'object') {
    return false;
  }

  return '@type' in object && '@id' in object && 'ulid' in object;
}
