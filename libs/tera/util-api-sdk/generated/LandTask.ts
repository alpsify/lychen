 
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
  LandTask,
  LandTaskGetCollectionParams,
  LandTaskJsonld,
  LandTaskMarkAsDonePayload,
  LandTaskMarkAsInProgressPayload,
} from "./data-contracts";
import { ContentType, HttpClient, type RequestParams } from "./http-client";

export class LandTask<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandTask resources.
 *
 * @tags LandTask
 * @name LandTaskGetCollection
 * @summary Retrieves the collection of LandTask resources.
 * @request GET:/api/land_tasks
 * @secure
 * @response `200` `{
    member: (LandTaskJsonld)[],
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

}` LandTask collection
 * @response `403` `void` Forbidden
 */
  landTaskGetCollection = (query: LandTaskGetCollectionParams, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandTaskJsonld[];
        search?: {
          "@type"?: string;
          mapping?: {
            "@type"?: string;
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
          "@id"?: string;
          "@type"?: string;
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
      path: `/api/land_tasks`,
      method: "GET",
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: "json",
      ...params,
    });

  /**
   * @description Creates a LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskPost
   * @summary Creates a LandTask resource.
   * @request POST:/api/land_tasks
   * @secure
   * @response `201` `LandTaskJsonld` LandTask resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landTaskPost = (data: LandTaskJsonld, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks`,
      method: "POST",
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: "json",
      ...params,
    });

  /**
   * @description Retrieves a LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskGet
   * @summary Retrieves a LandTask resource.
   * @request GET:/api/land_tasks/{ulid}
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landTaskGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}`,
      method: "GET",
      secure: true,
      type: ContentType.JsonLd,
      format: "json",
      ...params,
    });

  /**
   * @description Removes the LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskDelete
   * @summary Removes the LandTask resource.
   * @request DELETE:/api/land_tasks/{ulid}
   * @secure
   * @response `204` `void` LandTask resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landTaskDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_tasks/${ulid}`,
      method: "DELETE",
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskPatch
   * @summary Updates the LandTask resource.
   * @request PATCH:/api/land_tasks/{ulid}
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landTaskPatch = (ulid: string, data: LandTask, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}`,
      method: "PATCH",
      body: data,
      secure: true,
      format: "json",
      ...params,
    });

  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskMarkAsDone
   * @summary Mark as done
   * @request PATCH:/api/land_tasks/{ulid}/mark_as_done
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landTaskMarkAsDone = (ulid: string, data?: LandTaskMarkAsDonePayload, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}/mark_as_done`,
      method: "PATCH",
      body: data,
      secure: true,
      format: "json",
      ...params,
    });

  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name LandTaskMarkAsInProgress
   * @summary Mark as in progress
   * @request PATCH:/api/land_tasks/{ulid}/mark_as_in_progress
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landTaskMarkAsInProgress = (ulid: string, data?: LandTaskMarkAsInProgressPayload, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}/mark_as_in_progress`,
      method: "PATCH",
      body: data,
      secure: true,
      format: "json",
      ...params,
    });
}
