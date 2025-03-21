 
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
  LandMemberInvitationCheckEmailUnicityParams,
  LandMemberInvitationGetCollectionParams,
  LandMemberInvitationJsonld,
  LandMemberInvitationJsonldUserLandMemberInvitationCollection,
  LandMemberInvitationJsonldUserLandMemberInvitationGet,
  LandMemberInvitationJsonldUserLandMemberInvitationPost,
  LandMemberInvitationUserLandMemberInvitationAccept,
  LandMemberInvitationUserLandMemberInvitationPatch,
  LandMemberInvitationUserLandMemberInvitationRefuse,
} from './data-contracts';
import { ContentType, HttpClient, type RequestParams } from './http-client';

export class LandMemberInvitation<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
 * @description Retrieves the collection of LandMemberInvitation resources.
 *
 * @tags LandMemberInvitation
 * @name LandMemberInvitationGetCollection
 * @summary Retrieves the collection of LandMemberInvitation resources.
 * @request GET:/api/land_member_invitations
 * @secure
 * @response `200` `{
    member: (LandMemberInvitationJsonldUserLandMemberInvitationCollection)[],
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
  landMemberInvitationGetCollection = (
    query: LandMemberInvitationGetCollectionParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        member: LandMemberInvitationJsonldUserLandMemberInvitationCollection[];
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
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Creates a LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationPost
   * @summary Creates a LandMemberInvitation resource.
   * @request POST:/api/land_member_invitations
   * @secure
   * @response `201` `LandMemberInvitationJsonld` LandMemberInvitation resource created
   * @response `400` `void` Invalid input
   * @response `422` `void` Unprocessable entity
   */
  landMemberInvitationPost = (
    data: LandMemberInvitationJsonldUserLandMemberInvitationPost,
    params: RequestParams = {},
  ) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations`,
      method: 'POST',
      body: data,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
 * @description Retrieves a LandMemberInvitation resource.
 *
 * @tags LandMemberInvitation
 * @name LandMemberInvitationCheckEmailUnicity
 * @summary Check if an email is unique for a given land
 * @request GET:/api/land_member_invitations/check_email_unicity
 * @secure
 * @response `200` `{
    isUnique?: boolean,

}` Email unicity check result
 * @response `400` `void` Bad request
 * @response `404` `void` Resource not found
 */
  landMemberInvitationCheckEmailUnicity = (
    query: LandMemberInvitationCheckEmailUnicityParams,
    params: RequestParams = {},
  ) =>
    this.http.request<
      {
        isUnique?: boolean;
      },
      void
    >({
      path: `/api/land_member_invitations/check_email_unicity`,
      method: 'GET',
      query: query,
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Retrieves a LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationGet
   * @summary Retrieves a LandMemberInvitation resource.
   * @request GET:/api/land_member_invitations/{ulid}
   * @secure
   * @response `200` `LandMemberInvitationJsonldUserLandMemberInvitationGet` LandMemberInvitation resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landMemberInvitationGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandMemberInvitationJsonldUserLandMemberInvitationGet, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'GET',
      secure: true,
      type: ContentType.JsonLd,
      format: 'json',
      ...params,
    });

  /**
   * @description Removes the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationDelete
   * @summary Removes the LandMemberInvitation resource.
   * @request DELETE:/api/land_member_invitations/{ulid}
   * @secure
   * @response `204` `void` LandMemberInvitation resource deleted
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landMemberInvitationDelete = (ulid: string, params: RequestParams = {}) =>
    this.http.request<void, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'DELETE',
      secure: true,
      type: ContentType.JsonLd,
      ...params,
    });

  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationPatch
   * @summary Updates the LandMemberInvitation resource.
   * @request PATCH:/api/land_member_invitations/{ulid}
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landMemberInvitationPatch = (
    ulid: string,
    data: LandMemberInvitationUserLandMemberInvitationPatch,
    params: RequestParams = {},
  ) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationAccept
   * @summary Updates the LandMemberInvitation resource.
   * @request PATCH:/api/land_member_invitations/{ulid}/accept
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landMemberInvitationAccept = (
    ulid: string,
    data: LandMemberInvitationUserLandMemberInvitationAccept,
    params: RequestParams = {},
  ) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}/accept`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });

  /**
   * @description Updates the LandMemberInvitation resource.
   *
   * @tags LandMemberInvitation
   * @name LandMemberInvitationRefuse
   * @summary Updates the LandMemberInvitation resource.
   * @request PATCH:/api/land_member_invitations/{ulid}/refuse
   * @secure
   * @response `200` `LandMemberInvitationJsonld` LandMemberInvitation resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landMemberInvitationRefuse = (
    ulid: string,
    data: LandMemberInvitationUserLandMemberInvitationRefuse,
    params: RequestParams = {},
  ) =>
    this.http.request<LandMemberInvitationJsonld, void>({
      path: `/api/land_member_invitations/${ulid}/refuse`,
      method: 'PATCH',
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: 'json',
      ...params,
    });
}
