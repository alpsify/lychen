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

import type { PlantGlobalGetCollectionParams, PlantGlobalJsonld } from './data-contracts';
import type { HttpClient, RequestParams } from './http-client';

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
}
