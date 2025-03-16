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
  LandResearchRequest,
  LandResearchRequestGetCollectionParams,
  LandResearchRequestJsonld,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandResearchRequest<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandResearchRequest resources.
 *
 * @tags LandResearchRequest
 * @name LandResearchRequestGetCollection
 * @summary Retrieves the collection of LandResearchRequest resources.
 * @request GET:/api/land_research_requests
 * @secure
 * @response `200` `{
    member: (LandResearchRequestJsonld)[],
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

}` LandResearchRequest collection
 */
  landResearchRequestGetCollection = (
    query: LandResearchRequestGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandResearchRequestJsonld[];
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
      path: `/api/land_research_requests`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandResearchRequest resource.
   *
   * @tags LandResearchRequest
   * @name LandResearchRequestPost
   * @summary Creates a LandResearchRequest resource.
   * @request POST:/api/land_research_requests
   * @secure
   * @response `201` `LandResearchRequestJsonld` LandResearchRequest resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landResearchRequestPost = (data: LandResearchRequestJsonld, params: RequestParams = {}) =>
    this.http.request<LandResearchRequestJsonld, void>({
      path: `/api/land_research_requests`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandResearchRequest resource.
   *
   * @tags LandResearchRequest
   * @name LandResearchRequestGet
   * @summary Retrieves a LandResearchRequest resource.
   * @request GET:/api/land_research_requests/{ulid}
   * @secure
   * @response `200` `LandResearchRequestJsonld` LandResearchRequest resource
   * @response `404` `void` Resource not found
   */
  landResearchRequestGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandResearchRequestJsonld, void>({
      path: `/api/land_research_requests/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandResearchRequest resource.
   *
   * @tags LandResearchRequest
   * @name LandResearchRequestDelete
   * @summary Removes the LandResearchRequest resource.
   * @request DELETE:/api/land_research_requests/{ulid}
   * @secure
   * @response `204` `void` LandResearchRequest resource deleted
   * @response `404` `void` Resource not found
   */
  landResearchRequestDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_research_requests/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandResearchRequest resource.
   *
   * @tags LandResearchRequest
   * @name LandResearchRequestPatch
   * @summary Updates the LandResearchRequest resource.
   * @request PATCH:/api/land_research_requests/{ulid}
   * @secure
   * @response `200` `LandResearchRequestJsonld` LandResearchRequest resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landResearchRequestPatch = (
    ulid: string,
    data: LandResearchRequest,
    params: RequestParams = {},
  ) =>
    this.http.request<LandResearchRequestJsonld, void>({
      path: `/api/land_research_requests/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
