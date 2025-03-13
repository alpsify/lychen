/* eslint-disable */
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { Plant, PlantGetCollectionParams, PlantJsonld } from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class Plant<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of Plant resources.
 *
 * @tags Plant
 * @name PlantGetCollection
 * @summary Retrieves the collection of Plant resources.
 * @request GET:/api/plants
 * @secure
 * @response `200` `{
    member: (PlantJsonld)[],
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

}` Plant collection
 */
  plantGetCollection = (query: PlantGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: PlantJsonld[];
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
      any
    >({
      path: `/api/plants`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a Plant resource.
   *
   * @tags Plant
   * @name PlantPost
   * @summary Creates a Plant resource.
   * @request POST:/api/plants
   * @secure
   * @response `201` `PlantJsonld` Plant resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  plantPost = (data: PlantJsonld, params: RequestParams = {}) =>
    this.http.request<PlantJsonld, void>({
      path: `/api/plants`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a Plant resource.
   *
   * @tags Plant
   * @name PlantGet
   * @summary Retrieves a Plant resource.
   * @request GET:/api/plants/{ulid}
   * @secure
   * @response `200` `PlantJsonld` Plant resource
   * @response `404` `void` Resource not found
   */
  plantGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<PlantJsonld, void>({
      path: `/api/plants/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the Plant resource.
   *
   * @tags Plant
   * @name PlantDelete
   * @summary Removes the Plant resource.
   * @request DELETE:/api/plants/{ulid}
   * @secure
   * @response `204` `void` Plant resource deleted
   * @response `404` `void` Resource not found
   */
  plantDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/plants/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the Plant resource.
   *
   * @tags Plant
   * @name PlantPatch
   * @summary Updates the Plant resource.
   * @request PATCH:/api/plants/{ulid}
   * @secure
   * @response `200` `PlantJsonld` Plant resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  plantPatch = (ulid: string, data: Plant, params: RequestParams = {}) =>
    this.http.request<PlantJsonld, void>({
      path: `/api/plants/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });
}
