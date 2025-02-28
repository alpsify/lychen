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
  ApiSeedStocksGetCollectionParams,
  SeedStock,
  SeedStockJsonld,
} from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class SeedStock<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of SeedStock resources.
 *
 * @tags SeedStock
 * @name ApiSeedStocksGetCollection
 * @summary Retrieves the collection of SeedStock resources.
 * @request GET:/api/seed_stocks
 * @secure
 * @response `200` `{
    member: (SeedStockJsonld)[],
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

}` SeedStock collection
 */
  apiSeedStocksGetCollection = (
    query: ApiSeedStocksGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: SeedStockJsonld[];
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
      path: `/api/seed_stocks`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a SeedStock resource.
   *
   * @tags SeedStock
   * @name ApiSeedStocksPost
   * @summary Creates a SeedStock resource.
   * @request POST:/api/seed_stocks
   * @secure
   * @response `201` `SeedStockJsonld` SeedStock resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  apiSeedStocksPost = (data: SeedStockJsonld, params: RequestParams = {}) =>
    this.http.request<SeedStockJsonld, void>({
      path: `/api/seed_stocks`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a SeedStock resource.
   *
   * @tags SeedStock
   * @name ApiSeedStocksUlidGet
   * @summary Retrieves a SeedStock resource.
   * @request GET:/api/seed_stocks/{ulid}
   * @secure
   * @response `200` `SeedStockJsonld` SeedStock resource
   * @response `404` `void` Resource not found
   */
  apiSeedStocksUlidGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<SeedStockJsonld, void>({
      path: `/api/seed_stocks/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the SeedStock resource.
   *
   * @tags SeedStock
   * @name ApiSeedStocksUlidDelete
   * @summary Removes the SeedStock resource.
   * @request DELETE:/api/seed_stocks/{ulid}
   * @secure
   * @response `204` `void` SeedStock resource deleted
   * @response `404` `void` Resource not found
   */
  apiSeedStocksUlidDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/seed_stocks/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the SeedStock resource.
   *
   * @tags SeedStock
   * @name ApiSeedStocksUlidPatch
   * @summary Updates the SeedStock resource.
   * @request PATCH:/api/seed_stocks/{ulid}
   * @secure
   * @response `200` `SeedStockJsonld` SeedStock resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  apiSeedStocksUlidPatch = (ulid: string, data: SeedStock, params: RequestParams = {}) =>
    this.http.request<SeedStockJsonld, void>({
      path: `/api/seed_stocks/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
