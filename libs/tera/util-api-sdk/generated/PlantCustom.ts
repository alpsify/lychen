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
  PlantCustom,
  PlantCustomGetCollectionParams,
  PlantCustomJsonld,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class PlantCustom<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of PlantCustom resources.
 *
 * @tags PlantCustom
 * @name PlantCustomGetCollection
 * @summary Retrieves the collection of PlantCustom resources.
 * @request GET:/api/plant_customs
 * @secure
 * @response `200` `{
    member: (PlantCustomJsonld)[],
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

}` PlantCustom collection
 */
  plantCustomGetCollection = (query: PlantCustomGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: PlantCustomJsonld[];
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
      path: `/api/plant_customs`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a PlantCustom resource.
   *
   * @tags PlantCustom
   * @name PlantCustomPost
   * @summary Creates a PlantCustom resource.
   * @request POST:/api/plant_customs
   * @secure
   * @response `201` `PlantCustomJsonld` PlantCustom resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  plantCustomPost = (data: PlantCustomJsonld, params: RequestParams = {}) =>
    this.http.request<PlantCustomJsonld, void>({
      path: `/api/plant_customs`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a PlantCustom resource.
   *
   * @tags PlantCustom
   * @name PlantCustomGet
   * @summary Retrieves a PlantCustom resource.
   * @request GET:/api/plant_customs/{ulid}
   * @secure
   * @response `200` `PlantCustomJsonld` PlantCustom resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  plantCustomGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<PlantCustomJsonld, void>({
      path: `/api/plant_customs/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the PlantCustom resource.
   *
   * @tags PlantCustom
   * @name PlantCustomDelete
   * @summary Removes the PlantCustom resource.
   * @request DELETE:/api/plant_customs/{ulid}
   * @secure
   * @response `204` `void` PlantCustom resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  plantCustomDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/plant_customs/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the PlantCustom resource.
   *
   * @tags PlantCustom
   * @name PlantCustomPatch
   * @summary Updates the PlantCustom resource.
   * @request PATCH:/api/plant_customs/{ulid}
   * @secure
   * @response `200` `PlantCustomJsonld` PlantCustom resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  plantCustomPatch = (ulid: string, data: PlantCustom, params: RequestParams = {}) =>
    this.http.request<PlantCustomJsonld, void>({
      path: `/api/plant_customs/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });
}
