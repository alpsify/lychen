import type { Resource } from '@lychen/typescript-util-json-ld-hydra/types/Resource';
import { instanceOfResource } from '@lychen/typescript-util-json-ld-hydra/types/Resource';

export interface LandTask extends Resource {
  '@type': 'LandTask';
  title: string;
  content?: JSON;
  dueDate?: string;
  startDate?: string;
}

export function instanceOfLandTask(object: unknown): object is LandTask {
  if (!instanceOfResource(object)) {
    return false;
  }

  return object['@type'] === 'LandTask';
}
