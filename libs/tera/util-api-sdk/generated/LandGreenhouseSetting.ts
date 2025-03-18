 
/* tslint:disable */
/*
 * ---------------------------------------------------------------
 * ## THIS FILE WAS GENERATED VIA SWAGGER-TYPESCRIPT-API        ##
 * ##                                                           ##
 * ## AUTHOR: acacode                                           ##
 * ## SOURCE: https://github.com/acacode/swagger-typescript-api ##
 * ---------------------------------------------------------------
 */

import type { LandGreenhouseSetting, LandGreenhouseSettingJsonld } from "./data-contracts";
import { ContentType, HttpClient, type RequestParams } from "./http-client";

export class LandGreenhouseSetting<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * @description Retrieves a LandGreenhouseSetting resource.
   *
   * @tags LandGreenhouseSetting
   * @name LandGreenhouseSettingGet
   * @summary Retrieves a LandGreenhouseSetting resource.
   * @request GET:/api/land_greenhouse_settings/{ulid}
   * @secure
   * @response `200` `LandGreenhouseSettingJsonld` LandGreenhouseSetting resource
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   */
  landGreenhouseSettingGet = (ulid: string, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseSettingJsonld, void>({
      path: `/api/land_greenhouse_settings/${ulid}`,
      method: "GET",
      secure: true,
      type: ContentType.JsonLd,
      format: "json",
      ...params,
    });

  /**
   * @description Updates the LandGreenhouseSetting resource.
   *
   * @tags LandGreenhouseSetting
   * @name LandGreenhouseSettingPatch
   * @summary Updates the LandGreenhouseSetting resource.
   * @request PATCH:/api/land_greenhouse_settings/{ulid}
   * @secure
   * @response `200` `LandGreenhouseSettingJsonld` LandGreenhouseSetting resource updated
   * @response `400` `void` Invalid input
   * @response `403` `void` Forbidden
   * @response `404` `void` Resource not found
   * @response `422` `void` Unprocessable entity
   */
  landGreenhouseSettingPatch = (ulid: string, data: LandGreenhouseSetting, params: RequestParams = {}) =>
    this.http.request<LandGreenhouseSettingJsonld, void>({
      path: `/api/land_greenhouse_settings/${ulid}`,
      method: "PATCH",
      body: data,
      secure: true,
      type: ContentType.JsonMergePatch,
      format: "json",
      ...params,
    });
}
