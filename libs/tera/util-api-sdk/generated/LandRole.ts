 
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
  LandRoleGetCollectionParams,
  LandRoleJsonld,
  LandRoleJsonldUserLandRoleCollection,
  LandRoleJsonldUserLandRoleGet,
  LandRoleJsonldUserLandRolePost,
  LandRoleUserLandRolePatch,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandRole<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandRole resources.
 *
 * @tags LandRole
 * @name LandRoleGetCollection
 * @summary Retrieves the collection of LandRole resources.
 * @request GET:/api/land_roles
 * @secure
 * @response `200` `{
    member: (LandRoleJsonldUserLandRoleCollection)[],
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

}` LandRole collection
 * @response `403` `void` Forbidden
 */
  landRoleGetCollection = (query: LandRoleGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandRoleJsonldUserLandRoleCollection[];
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
      path: `/api/land_roles`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandRole resource.
   *
   * @tags LandRole
   * @name LandRolePost
   * @summary Creates a LandRole resource.
   * @request POST:/api/land_roles
   * @secure
   * @response `201` `LandRoleJsonld` LandRole resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landRolePost = (data: LandRoleJsonldUserLandRolePost, params: RequestParams = {}) =>
    this.http.request<LandRoleJsonld, void>({
      path: `/api/land_roles`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandRole resource.
   *
   * @tags LandRole
   * @name LandRoleGet
   * @summary Retrieves a LandRole resource.
   * @request GET:/api/land_roles/{ulid}
   * @secure
   * @response `200` `LandRoleJsonldUserLandRoleGet` LandRole resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landRoleGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandRoleJsonldUserLandRoleGet, void>({
      path: `/api/land_roles/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandRole resource.
   *
   * @tags LandRole
   * @name LandRoleDelete
   * @summary Removes the LandRole resource.
   * @request DELETE:/api/land_roles/{ulid}
   * @secure
   * @response `204` `void` LandRole resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landRoleDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_roles/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandRole resource.
   *
   * @tags LandRole
   * @name LandRolePatch
   * @summary Updates the LandRole resource.
   * @request PATCH:/api/land_roles/{ulid}
   * @secure
   * @response `200` `LandRoleJsonld` LandRole resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landRolePatch = (ulid: string, data: LandRoleUserLandRolePatch, params: RequestParams = {}) =>
    this.http.request<LandRoleJsonld, void>({
      path: `/api/land_roles/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
