 
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
  GetCollectionParams18,
  LandTask,
  LandTaskJsonld,
  MarkAsDonePayload,
  MarkAsInProgressPayload,
} from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class LandTask<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandTask resources.
 *
 * @tags LandTask
 * @name GetCollection
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
  getCollection = (query: GetCollectionParams18, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandTaskJsonld[];
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
      path: `/api/land_tasks`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a LandTask resource.
   *
   * @tags LandTask
   * @name Post
   * @summary Creates a LandTask resource.
   * @request POST:/api/land_tasks
   * @secure
   * @response `201` `LandTaskJsonld` LandTask resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  post = (data: LandTaskJsonld, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a LandTask resource.
   *
   * @tags LandTask
   * @name Get
   * @summary Retrieves a LandTask resource.
   * @request GET:/api/land_tasks/{ulid}
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  get = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the LandTask resource.
   *
   * @tags LandTask
   * @name Delete
   * @summary Removes the LandTask resource.
   * @request DELETE:/api/land_tasks/{ulid}
   * @secure
   * @response `204` `void` LandTask resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  delete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_tasks/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name Patch
   * @summary Updates the LandTask resource.
   * @request PATCH:/api/land_tasks/{ulid}
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  patch = (ulid: string, data: LandTask, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name MarkAsDone
   * @summary Mark as done
   * @request PATCH:/api/land_tasks/{ulid}/mark_as_done
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  markAsDone = (ulid: string, data?: MarkAsDonePayload, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}/mark_as_done`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Updates the LandTask resource.
   *
   * @tags LandTask
   * @name MarkAsInProgress
   * @summary Mark as in progress
   * @request PATCH:/api/land_tasks/{ulid}/mark_as_in_progress
   * @secure
   * @response `200` `LandTaskJsonld` LandTask resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  markAsInProgress = (ulid: string, data?: MarkAsInProgressPayload, params: RequestParams = {}) =>
    this.http.request<LandTaskJsonld, void>({
      path: `/api/land_tasks/${ulid}/mark_as_in_progress`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
