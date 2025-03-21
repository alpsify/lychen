/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type {
  LandGreenhouse,
  LandGreenhouseGetCollectionParams,
  LandGreenhouseJsonld,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandGreenhouse<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandGreenhouse resources.
 *
 * @tags LandGreenhouse
 * @name LandGreenhouseGetCollection
 * @summary Retrieves the collection of LandGreenhouse resources.
 * @request GET:/api/land_greenhouses
 * @secure
 * @response `200` `{
    member: (LandGreenhouseJsonld)[],
    search?: {
    "@type"?: string,
    mapping?: ({
    "@type"?: string,
    property?: string | null,
    required?: boolean,
    variable?: string,

})[],
    template?: string,
    variableRepresentation?: string,

},
  \** @min 0 *\
    totalItems?: number,
  \** @example {"@id":"string","type":"string","first":"string","last":"string","previous":"string","next":"string"} *\
    view?: {
  \** @format iri-reference *\
    "@id"?: string,
    "@type"?: string,
  \** @format iri-reference *\
    first?: string,
  \** @format iri-reference *\
    last?: string,
  \** @format iri-reference *\
    next?: string,
  \** @format iri-reference *\
    previous?: string,

},

}` LandGreenhouse collection
 * @response `403` `void` Forbidden
 */
  landGreenhouseGetCollection = (
    query: LandGreenhouseGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandGreenhouseJsonld[];
        search?: {
          '@type'?: string;
          mapping?: {
            '@type'?: string;
            property?: string | null;
            required?: boolean;
            variable?: string;
          }[];
          template?: string;
          variableRepresentation?: string;
        };
        /** @min 0 */
        totalItems?: number;
        /** @example {"@id":"string","type":"string","first":"string","last":"string","previous":"string","next":"string"} */
        view?: {
          /** @format iri-reference */
          '@id'?: string;
          '@type'?: string;
          /** @format iri-reference */
          first?: string;
          /** @format iri-reference */
          last?: string;
          /** @format iri-reference */
          next?: string;
          /** @format iri-reference */
          previous?: string;
        };
      },
      void
    >({
      path: `/api/land_greenhouses`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandGreenhouse resource.
   *
   * @tags LandGreenhouse
   * @name LandGreenhousePost
   * @summary Creates a LandGreenhouse resource.
   * @request POST:/api/land_greenhouses
   * @secure
   * @response `201` `LandGreenhouseJsonld` LandGreenhouse resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landGreenhousePost = (data: LandGreenhouseJsonld, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseJsonld, void>({
      path: `/api/land_greenhouses`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandGreenhouse resource.
   *
   * @tags LandGreenhouse
   * @name LandGreenhouseGet
   * @summary Retrieves a LandGreenhouse resource.
   * @request GET:/api/land_greenhouses/{ulid}
   * @secure
   * @response `200` `LandGreenhouseJsonld` LandGreenhouse resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landGreenhouseGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseJsonld, void>({
      path: `/api/land_greenhouses/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandGreenhouse resource.
   *
   * @tags LandGreenhouse
   * @name LandGreenhouseDelete
   * @summary Removes the LandGreenhouse resource.
   * @request DELETE:/api/land_greenhouses/{ulid}
   * @secure
   * @response `204` `void` LandGreenhouse resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landGreenhouseDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_greenhouses/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandGreenhouse resource.
   *
   * @tags LandGreenhouse
   * @name LandGreenhousePatch
   * @summary Updates the LandGreenhouse resource.
   * @request PATCH:/api/land_greenhouses/{ulid}
   * @secure
   * @response `200` `LandGreenhouseJsonld` LandGreenhouse resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landGreenhousePatch = (ulid: string, data: LandGreenhouse, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseJsonld, void>({
      path: `/api/land_greenhouses/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
