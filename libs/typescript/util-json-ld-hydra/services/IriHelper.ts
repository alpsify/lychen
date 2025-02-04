import type { Iri } from '../types/Iri';
import type { Ulid } from '../types/Ulid';

class IriHelper {
  getUlidFromIri(iri: Iri): Ulid {
    const ulid = iri.split('/').pop();
    if (!ulid) {
      throw new Error(`Invalid IRI: ${iri}`);
    }
    return ulid as Ulid;
  }
}

export default new IriHelper();
