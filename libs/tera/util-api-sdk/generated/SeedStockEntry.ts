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

import type { GetCollectionParams30, SeedStockEntry, SeedStockEntryJsonld } from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class SeedStockEntry<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of SeedStockEntry resources.
 *
 * @tags SeedStockEntry
 * @name GetCollection
 * @summary Retrieves the collection of SeedStockEntry resources.
 * @request GET:/api/seed_stock_entries
 * @secure
 * @response `200` `{
    member: (SeedStockEntryJsonld)[],
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

}` SeedStockEntry collection
 */
  getCollection = (query: GetCollectionParams30, params: RequestParams = {}) =>
    this.http.request<
      {
        member: SeedStockEntryJsonld[];
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
      path: `/api/seed_stock_entries`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a SeedStockEntry resource.
   *
   * @tags SeedStockEntry
   * @name Post
   * @summary Creates a SeedStockEntry resource.
   * @request POST:/api/seed_stock_entries
   * @secure
   * @response `201` `SeedStockEntryJsonld` SeedStockEntry resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  post = (data: SeedStockEntryJsonld, params: RequestParams = {}) =>
    this.http.request<SeedStockEntryJsonld, void>({
      path: `/api/seed_stock_entries`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a SeedStockEntry resource.
   *
   * @tags SeedStockEntry
   * @name Get
   * @summary Retrieves a SeedStockEntry resource.
   * @request GET:/api/seed_stock_entries/{ulid}
   * @secure
   * @response `200` `SeedStockEntryJsonld` SeedStockEntry resource
   * @response `404` `void` Resource not found
   */
  get = (ulid: string, params: RequestParams = {}) =>
    this.http.request<SeedStockEntryJsonld, void>({
      path: `/api/seed_stock_entries/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the SeedStockEntry resource.
   *
   * @tags SeedStockEntry
   * @name Delete
   * @summary Removes the SeedStockEntry resource.
   * @request DELETE:/api/seed_stock_entries/{ulid}
   * @secure
   * @response `204` `void` SeedStockEntry resource deleted
   * @response `404` `void` Resource not found
   */
  delete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/seed_stock_entries/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the SeedStockEntry resource.
   *
   * @tags SeedStockEntry
   * @name Patch
   * @summary Updates the SeedStockEntry resource.
   * @request PATCH:/api/seed_stock_entries/{ulid}
   * @secure
   * @response `200` `SeedStockEntryJsonld` SeedStockEntry resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  patch = (ulid: string, data: SeedStockEntry, params: RequestParams = {}) =>
    this.http.request<SeedStockEntryJsonld, void>({
      path: `/api/seed_stock_entries/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
