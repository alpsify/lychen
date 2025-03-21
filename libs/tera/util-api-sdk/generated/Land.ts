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
  LandGetCollectionLookingForMembersParams,
  LandGetCollectionParams,
  LandJsonld,
  LandJsonldUserLandCollection,
  LandJsonldUserLandGet,
  LandJsonldUserLandGetCollectionLookingForMembers,
  LandJsonldUserLandPost,
  LandUserLandPatch,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class Land<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of Land resources.
 *
 * @tags Land
 * @name LandGetCollection
 * @summary Retrieves the collection of Land resources.
 * @request GET:/api/lands
 * @secure
 * @response `200` `{
    member: (LandJsonldUserLandCollection)[],
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

}` Land collection
 */
  landGetCollection = (query: LandGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandJsonldUserLandCollection[];
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
      path: `/api/lands`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a Land resource.
   *
   * @tags Land
   * @name LandPost
   * @summary Creates a Land resource.
   * @request POST:/api/lands
   * @secure
   * @response `201` `LandJsonld` Land resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landPost = (data: LandJsonldUserLandPost, params: RequestParams = {}) =>
    this.http.request<LandJsonld, void>({
      path: `/api/lands`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
 * @description Retrieves the collection of Land resources.
 *
 * @tags Land
 * @name LandGetCollectionLookingForMembers
 * @summary Retrieves the collection of Land resources.
 * @request GET:/api/lands/looking_for_members
 * @secure
 * @response `200` `{
    member: (LandJsonldUserLandGetCollectionLookingForMembers)[],
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

}` Land collection
 */
  landGetCollectionLookingForMembers = (
    query: LandGetCollectionLookingForMembersParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandJsonldUserLandGetCollectionLookingForMembers[];
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
      path: `/api/lands/looking_for_members`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a Land resource.
   *
   * @tags Land
   * @name LandGet
   * @summary Retrieves a Land resource.
   * @request GET:/api/lands/{ulid}
   * @secure
   * @response `200` `LandJsonldUserLandGet` Land resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandJsonldUserLandGet, void>({
      path: `/api/lands/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the Land resource.
   *
   * @tags Land
   * @name LandDelete
   * @summary Removes the Land resource.
   * @request DELETE:/api/lands/{ulid}
   * @secure
   * @response `204` `void` Land resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/lands/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the Land resource.
   *
   * @tags Land
   * @name LandPatch
   * @summary Updates the Land resource.
   * @request PATCH:/api/lands/{ulid}
   * @secure
   * @response `200` `LandJsonld` Land resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landPatch = (ulid: string, data: LandUserLandPatch, params: RequestParams = {}) =>
    this.http.request<LandJsonld, void>({
      path: `/api/lands/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
