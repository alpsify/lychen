/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { GetCollectionParams2, LandArea, LandAreaJsonld } from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class LandArea<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandArea resources.
 *
 * @tags LandArea
 * @name GetCollection
 * @summary Retrieves the collection of LandArea resources.
 * @request GET:/api/land_areas
 * @secure
 * @response `200` `{
    member: (LandAreaJsonld)[],
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

}` LandArea collection
 * @response `403` `void` Forbidden
 */
  getCollection = (query: GetCollectionParams2, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandAreaJsonld[];
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
      path: `/api/land_areas`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a LandArea resource.
   *
   * @tags LandArea
   * @name Post
   * @summary Creates a LandArea resource.
   * @request POST:/api/land_areas
   * @secure
   * @response `201` `LandAreaJsonld` LandArea resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  post = (data: LandAreaJsonld, params: RequestParams = {}) =>
    this.http.request<LandAreaJsonld, void>({
      path: `/api/land_areas`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a LandArea resource.
   *
   * @tags LandArea
   * @name Get
   * @summary Retrieves a LandArea resource.
   * @request GET:/api/land_areas/{ulid}
   * @secure
   * @response `200` `LandAreaJsonld` LandArea resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  get = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandAreaJsonld, void>({
      path: `/api/land_areas/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the LandArea resource.
   *
   * @tags LandArea
   * @name Delete
   * @summary Removes the LandArea resource.
   * @request DELETE:/api/land_areas/{ulid}
   * @secure
   * @response `204` `void` LandArea resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  delete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_areas/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the LandArea resource.
   *
   * @tags LandArea
   * @name Patch
   * @summary Updates the LandArea resource.
   * @request PATCH:/api/land_areas/{ulid}
   * @secure
   * @response `200` `LandAreaJsonld` LandArea resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  patch = (ulid: string, data: LandArea, params: RequestParams = {}) =>
    this.http.request<LandAreaJsonld, void>({
      path: `/api/land_areas/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
