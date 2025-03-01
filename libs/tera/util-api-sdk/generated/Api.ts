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

import type { HttpClient, RequestParams } from './http-client';

export class Api<SecurityDataType = unknown> {
  http: HttpClient<SecurityDataType>;

  constructor(http: HttpClient<SecurityDataType>) {
    this.http = http;
  }

  /**
   * No description
   *
   * @name ApierrorsStatusGet
   * @request GET:/api/errors/{status}
   * @secure
   */
  apierrorsStatusGet = (status: string, params: RequestParams = {}) =>
    this.http.request<any, any>({
      path: `/api/errors/${status}`,
      method: 'GET',
      secure: true,
      ...params,
    });
  /**
   * No description
   *
   * @name ApivalidationErrorsIdGet
   * @request GET:/api/validation_errors/{id}
   * @secure
   */
  apivalidationErrorsIdGet = (id: string, params: RequestParams = {}) =>
    this.http.request<any, any>({
      path: `/api/validation_errors/${id}`,
      method: 'GET',
      secure: true,
      ...params,
    });
}
