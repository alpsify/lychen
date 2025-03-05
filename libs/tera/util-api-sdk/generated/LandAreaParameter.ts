 
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandAreaParameter, LandAreaParameterJsonld } from "./data-contracts";
import type { ContentType, HttpClient, RequestParams } from "./http-client";

export class LandAreaParameter<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandAreaParameter resource.
   *
   * @tags LandAreaParameter
   * @name LandAreaParameterGet
   * @summary Retrieves a LandAreaParameter resource.
   * @request GET:/api/land_area_parameters/{ulid}
   * @secure
   * @response `200` `LandAreaParameterJsonld` LandAreaParameter resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landAreaParameterGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandAreaParameterJsonld, void>({
      path: `/api/land_area_parameters/${ulid}`,
      method: "GET",
      secure: true,
      format: "json",
      ...params,
    });
  /**
   * @description Updates the LandAreaParameter resource.
   *
   * @tags LandAreaParameter
   * @name LandAreaParameterPatch
   * @summary Updates the LandAreaParameter resource.
   * @request PATCH:/api/land_area_parameters/{ulid}
   * @secure
   * @response `200` `LandAreaParameterJsonld` LandAreaParameter resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landAreaParameterPatch = (ulid: string, data: LandAreaParameter, params: RequestParams = {}) =>
    this.http.request<LandAreaParameterJsonld, void>({
      path: `/api/land_area_parameters/${ulid}`,
      method: "PATCH",
      body: data,
      secure: true,
      type: ContentType.Json,
      format: "json",
      ...params,
    });
}
