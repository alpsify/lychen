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
  LandCultivationPlan,
  LandCultivationPlanGetCollectionParams,
  LandCultivationPlanJsonld,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandCultivationPlan<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandCultivationPlan resources.
 *
 * @tags LandCultivationPlan
 * @name LandCultivationPlanGetCollection
 * @summary Retrieves the collection of LandCultivationPlan resources.
 * @request GET:/api/land_cultivation_plans
 * @secure
 * @response `200` `{
    member: (LandCultivationPlanJsonld)[],
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

}` LandCultivationPlan collection
 * @response `403` `void` Forbidden
 */
  landCultivationPlanGetCollection = (
    query: LandCultivationPlanGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandCultivationPlanJsonld[];
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
      path: `/api/land_cultivation_plans`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandCultivationPlan resource.
   *
   * @tags LandCultivationPlan
   * @name LandCultivationPlanPost
   * @summary Creates a LandCultivationPlan resource.
   * @request POST:/api/land_cultivation_plans
   * @secure
   * @response `201` `LandCultivationPlanJsonld` LandCultivationPlan resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landCultivationPlanPost = (data: LandCultivationPlanJsonld, params: RequestParams = {}) =>
    this.http.request<LandCultivationPlanJsonld, void>({
      path: `/api/land_cultivation_plans`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandCultivationPlan resource.
   *
   * @tags LandCultivationPlan
   * @name LandCultivationPlanGet
   * @summary Retrieves a LandCultivationPlan resource.
   * @request GET:/api/land_cultivation_plans/{ulid}
   * @secure
   * @response `200` `LandCultivationPlanJsonld` LandCultivationPlan resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landCultivationPlanGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandCultivationPlanJsonld, void>({
      path: `/api/land_cultivation_plans/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandCultivationPlan resource.
   *
   * @tags LandCultivationPlan
   * @name LandCultivationPlanDelete
   * @summary Removes the LandCultivationPlan resource.
   * @request DELETE:/api/land_cultivation_plans/{ulid}
   * @secure
   * @response `204` `void` LandCultivationPlan resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landCultivationPlanDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_cultivation_plans/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandCultivationPlan resource.
   *
   * @tags LandCultivationPlan
   * @name LandCultivationPlanPatch
   * @summary Updates the LandCultivationPlan resource.
   * @request PATCH:/api/land_cultivation_plans/{ulid}
   * @secure
   * @response `200` `LandCultivationPlanJsonld` LandCultivationPlan resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landCultivationPlanPatch = (
    ulid: string,
    data: LandCultivationPlan,
    params: RequestParams = {},
  ) =>
    this.http.request<LandCultivationPlanJsonld, void>({
      path: `/api/land_cultivation_plans/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
