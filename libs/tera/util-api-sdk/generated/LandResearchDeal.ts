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
  LandResearchDeal,
  LandResearchDealGetCollectionParams,
  LandResearchDealJsonld,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandResearchDeal<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandResearchDeal resources.
 *
 * @tags LandResearchDeal
 * @name LandResearchDealGetCollection
 * @summary Retrieves the collection of LandResearchDeal resources.
 * @request GET:/api/land_research_deals
 * @secure
 * @response `200` `{
    member: (LandResearchDealJsonld)[],
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

}` LandResearchDeal collection
 */
  landResearchDealGetCollection = (
    query: LandResearchDealGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandResearchDealJsonld[];
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
      path: `/api/land_research_deals`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealPost
   * @summary Creates a LandResearchDeal resource.
   * @request POST:/api/land_research_deals
   * @secure
   * @response `201` `LandResearchDealJsonld` LandResearchDeal resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landResearchDealPost = (data: LandResearchDealJsonld, params: RequestParams = {}) =>
    this.http.request<LandResearchDealJsonld, void>({
      path: `/api/land_research_deals`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealGet
   * @summary Retrieves a LandResearchDeal resource.
   * @request GET:/api/land_research_deals/{ulid}
   * @secure
   * @response `200` `LandResearchDealJsonld` LandResearchDeal resource
   * @response `404` `void` Resource not found
   */
  landResearchDealGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandResearchDealJsonld, void>({
      path: `/api/land_research_deals/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealDelete
   * @summary Removes the LandResearchDeal resource.
   * @request DELETE:/api/land_research_deals/{ulid}
   * @secure
   * @response `204` `void` LandResearchDeal resource deleted
   * @response `404` `void` Resource not found
   */
  landResearchDealDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_research_deals/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealPatch
   * @summary Accept the LandResearchDeal resource.
   * @request PATCH:/api/land_research_deals/{ulid}/accept
   * @secure
   * @response `200` `LandResearchDealJsonld` LandResearchDeal resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landResearchDealPatch = (ulid: string, data: LandResearchDeal, params: RequestParams = {}) =>
    this.http.request<LandResearchDealJsonld, void>({
      path: `/api/land_research_deals/${ulid}/accept`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealPatch2
   * @summary Archive the LandResearchDeal resource.
   * @request PATCH:/api/land_research_deals/{ulid}/archive
   * @originalName landResearchDealPatch
   * @duplicate
   * @secure
   * @response `200` `LandResearchDealJsonld` LandResearchDeal resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landResearchDealPatch2 = (ulid: string, data: LandResearchDeal, params: RequestParams = {}) =>
    this.http.request<LandResearchDealJsonld, void>({
      path: `/api/land_research_deals/${ulid}/archive`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandResearchDeal resource.
   *
   * @tags LandResearchDeal
   * @name LandResearchDealPatch3
   * @summary Refuse the LandResearchDeal resource.
   * @request PATCH:/api/land_research_deals/{ulid}/refuse
   * @originalName landResearchDealPatch
   * @duplicate
   * @secure
   * @response `200` `LandResearchDealJsonld` LandResearchDeal resource updated
   * @response `400` `void` Invalid input
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landResearchDealPatch3 = (ulid: string, data: LandResearchDeal, params: RequestParams = {}) =>
    this.http.request<LandResearchDealJsonld, void>({
      path: `/api/land_research_deals/${ulid}/refuse`,
      method: 'PATCH',
      body: data,
      secure: true,
      format: 'json',
      ...params,
    });
}
