import type { Collection } from '@lychen/typescript-util-json-ld-hydra/types/Collection';
import {
  instanceOfResource,
  type Resource,
} from '@lychen/typescript-util-json-ld-hydra/types/Resource';
import type { Ulid } from '@lychen/typescript-util-json-ld-hydra/types/Ulid';
import { type AxiosInstance, type AxiosRequestConfig, type AxiosResponse } from 'axios';

export class Repository<T extends Resource> {
  constructor(
    protected axiosInstance: AxiosInstance,
    protected urlExtension: string,
  ) {}

  getCollection(config?: AxiosRequestConfig): Promise<AxiosResponse<Collection<T>>> {
    return this.axiosInstance.get<Collection<T>>(this.urlExtension, config);
  }

  get(resourceOrIdentifier: T | Ulid, config?: AxiosRequestConfig): Promise<AxiosResponse<T>> {
    return this.axiosInstance.get<T>(this.generateResourceUrl(resourceOrIdentifier), config);
  }

  patch(resourceOrIdentifier: T | Ulid, config?: AxiosRequestConfig): Promise<AxiosResponse<T>> {
    return this.axiosInstance.patch<T>(this.generateResourceUrl(resourceOrIdentifier), config);
  }

  post(data?: Partial<T>, config?: AxiosRequestConfig): Promise<AxiosResponse<T>> {
    return this.axiosInstance.post<T>(this.urlExtension, data, config);
  }

  delete(resourceOrIdentifier: T | Ulid, config?: AxiosRequestConfig): Promise<AxiosResponse> {
    return this.axiosInstance.delete(this.generateResourceUrl(resourceOrIdentifier), config);
  }

  private extractIdentifier(resourceOrIdentifier: T | Ulid) {
    return instanceOfResource(resourceOrIdentifier)
      ? resourceOrIdentifier.ulid
      : resourceOrIdentifier;
  }

  private generateResourceUrl(resourceOrIdentifier: T | Ulid) {
    return `${this.urlExtension}/${this.extractIdentifier(resourceOrIdentifier)}`;
  }
}
