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

import type {
  PlantGlobal,
  PlantGlobalGetCollectionParams,
  PlantGlobalJsonld,
} from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class PlantGlobal<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of PlantGlobal resources.
 *
 * @tags PlantGlobal
 * @name PlantGlobalGetCollection
 * @summary Retrieves the collection of PlantGlobal resources.
 * @request GET:/api/plant_globals
 * @secure
 * @response `200` `{
    member: (PlantGlobalJsonld)[],
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

}` PlantGlobal collection
 */
  plantGlobalGetCollection = (query: PlantGlobalGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: PlantGlobalJsonld[];
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
      path: `/api/plant_globals`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a PlantGlobal resource.
   *
   * @tags PlantGlobal
   * @name PlantGlobalPost
   * @summary Creates a PlantGlobal resource.
   * @request POST:/api/plant_globals
   * @secure
   * @response `201` `PlantGlobalJsonld` PlantGlobal resource created
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `422` `void` Unprocessable entity
   */
  plantGlobalPost = (data: PlantGlobalJsonld, params: RequestParams = {}) =>
    this.http.request<PlantGlobalJsonld, void>({
      path: `/api/plant_globals`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a PlantGlobal resource.
   *
   * @tags PlantGlobal
   * @name PlantGlobalGet
   * @summary Retrieves a PlantGlobal resource.
   * @request GET:/api/plant_globals/{ulid}
   * @secure
   * @response `200` `PlantGlobalJsonld` PlantGlobal resource
   * @response `404` `void` Resource not found
   */
  plantGlobalGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<PlantGlobalJsonld, void>({
      path: `/api/plant_globals/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the PlantGlobal resource.
   *
   * @tags PlantGlobal
   * @name PlantGlobalDelete
   * @summary Removes the PlantGlobal resource.
   * @request DELETE:/api/plant_globals/{ulid}
   * @secure
   * @response `204` `void` PlantGlobal resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  plantGlobalDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/plant_globals/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the PlantGlobal resource.
   *
   * @tags PlantGlobal
   * @name PlantGlobalPatch
   * @summary Updates the PlantGlobal resource.
   * @request PATCH:/api/plant_globals/{ulid}
   * @secure
   * @response `200` `PlantGlobalJsonld` PlantGlobal resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  plantGlobalPatch = (ulid: string, data: PlantGlobal, params: RequestParams = {}) =>
    this.http.request<PlantGlobalJsonld, void>({
      path: `/api/plant_globals/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
