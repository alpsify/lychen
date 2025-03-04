 
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandMember, LandMemberGetCollectionParams, LandMemberJsonld } from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class LandMember<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandMember resources.
 *
 * @tags LandMember
 * @name LandMemberGetCollection
 * @summary Retrieves the collection of LandMember resources.
 * @request GET:/api/land_members
 * @secure
 * @response `200` `{
    member: (LandMemberJsonld)[],
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

}` LandMember collection
 * @response `403` `void` Forbidden
 */
  landMemberGetCollection = (query: LandMemberGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandMemberJsonld[];
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
      path: `/api/land_members`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a LandMember resource.
   *
   * @tags LandMember
   * @name LandMemberGet
   * @summary Retrieves a LandMember resource.
   * @request GET:/api/land_members/{ulid}
   * @secure
   * @response `200` `LandMemberJsonld` LandMember resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landMemberGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandMemberJsonld, void>({
      path: `/api/land_members/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the LandMember resource.
   *
   * @tags LandMember
   * @name LandMemberDelete
   * @summary Removes the LandMember resource.
   * @request DELETE:/api/land_members/{ulid}
   * @secure
   * @response `204` `void` LandMember resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landMemberDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_members/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the LandMember resource.
   *
   * @tags LandMember
   * @name LandMemberPatch
   * @summary Updates the LandMember resource.
   * @request PATCH:/api/land_members/{ulid}
   * @secure
   * @response `200` `LandMemberJsonld` LandMember resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landMemberPatch = (ulid: string, data: LandMember, params: RequestParams = {}) =>
    this.http.request<LandMemberJsonld, void>({
      path: `/api/land_members/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
