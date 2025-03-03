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
  GetCollectionParams22,
  PlantConversionRequest,
  PlantConversionRequestJsonld,
} from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class PlantConversionRequest<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of PlantConversionRequest resources.
 *
 * @tags PlantConversionRequest
 * @name GetCollection
 * @summary Retrieves the collection of PlantConversionRequest resources.
 * @request GET:/api/plant_conversion_requests
 * @secure
 * @response `200` `{
    member: (PlantConversionRequestJsonld)[],
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

}` PlantConversionRequest collection
 */
  getCollection = (query: GetCollectionParams22, params: RequestParams = {}) =>
    this.http.request<
      {
        member: PlantConversionRequestJsonld[];
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
      path: `/api/plant_conversion_requests`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a PlantConversionRequest resource.
   *
   * @tags PlantConversionRequest
   * @name Post
   * @summary Creates a PlantConversionRequest resource.
   * @request POST:/api/plant_conversion_requests
   * @secure
   * @response `201` `PlantConversionRequestJsonld` PlantConversionRequest resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  post = (data: PlantConversionRequestJsonld, params: RequestParams = {}) =>
    this.http.request<PlantConversionRequestJsonld, void>({
      path: `/api/plant_conversion_requests`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a PlantConversionRequest resource.
   *
   * @tags PlantConversionRequest
   * @name Get
   * @summary Retrieves a PlantConversionRequest resource.
   * @request GET:/api/plant_conversion_requests/{ulid}
   * @secure
   * @response `200` `PlantConversionRequestJsonld` PlantConversionRequest resource
   * @response `404` `void` Resource not found
   */
  get = (ulid: string, params: RequestParams = {}) =>
    this.http.request<PlantConversionRequestJsonld, void>({
      path: `/api/plant_conversion_requests/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the PlantConversionRequest resource.
   *
   * @tags PlantConversionRequest
   * @name Delete
   * @summary Removes the PlantConversionRequest resource.
   * @request DELETE:/api/plant_conversion_requests/{ulid}
   * @secure
   * @response `204` `void` PlantConversionRequest resource deleted
   * @response `404` `void` Resource not found
   */
  delete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/plant_conversion_requests/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the PlantConversionRequest resource.
   *
   * @tags PlantConversionRequest
   * @name Patch
   * @summary Updates the PlantConversionRequest resource.
   * @request PATCH:/api/plant_conversion_requests/{ulid}
   * @secure
   * @response `200` `PlantConversionRequestJsonld` PlantConversionRequest resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  patch = (ulid: string, data: PlantConversionRequest, params: RequestParams = {}) =>
    this.http.request<PlantConversionRequestJsonld, void>({
      path: `/api/plant_conversion_requests/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
