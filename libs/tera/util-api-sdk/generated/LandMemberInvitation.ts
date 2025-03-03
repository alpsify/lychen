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
  AcceptPayload,
  GetCollectionParams10,
  LandMemberInvitation,
  LandMemberInvitationJsonld,
  RefusePayload,
} from './data-contracts';
import type { ContentType, HttpClient, RequestParams } from './http-client';

export class LandMemberInvitation<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandMemberInvitation resources.
 *
 * @tags LandMemberInvitation
 * @name GetCollection
 * @summary Retrieves the collection of LandMemberInvitation resources.
 * @request GET:/api/land_member_invitations
 * @secure
 * @response `200` `{
    member: (LandMemberInvitationJsonld)[],
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

}` LandMemberInvitation collection
 * @response `403` `void` Forbidden
 */
  getCollection = (query: GetCollectionParams10, params: RequestParams = {}) =>
    this.http.request<
      {
        member: LandMemberInvitationJsonld[];
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
      path: `/api/land_member_invitations`,
      method: 'GET',
      query: query,
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Creates a LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Post
   * @summary Creates a LandMemberInvitation resource.
   * @request POST:/api/land_member_invitations
   * @secure
   * @response `201` `LandMemberInvitationJsonld` LandMemberInvitation resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  post = (data: LandMemberInvitationJsonld, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Retrieves a LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Get
   * @summary Retrieves a LandMemberInvitation resource.
   * @request GET:/api/land_member_invitations/{ulid}
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  get = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'GET',
      secure: true,
      format: 'json',
      ...params,
    });
  /**
   * @description Removes the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Delete
   * @summary Removes the LandMemberInvitation resource.
   * @request DELETE:/api/land_member_invitations/{ulid}
   * @secure
   * @response `204` `void` LandMemberInvitation resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  delete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'DELETE',
      secure: true,
      ...params,
    });
  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Patch
   * @summary Updates the LandMemberInvitation resource.
   * @request PATCH:/api/land_member_invitations/{ulid}
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  patch = (ulid: string, data: LandMemberInvitation, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Accept
   * @summary Accept the invitation
   * @request PATCH:/api/land_member_invitations/{ulid}/accept
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  accept = (ulid: string, data?: AcceptPayload, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}/accept`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name Refuse
   * @summary Refuse the invitation
   * @request PATCH:/api/land_member_invitations/{ulid}/refuse
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  refuse = (ulid: string, data?: RefusePayload, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}/refuse`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.Json,
      format: 'json',
      ...params,
    });
}
