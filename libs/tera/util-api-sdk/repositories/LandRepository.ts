import type { Land } from '../model/Land';
import { Repository } from '@lychen/typescript-util-api/classes/Repository';
import axiosInstance from '@lychen/typescript-util-api/ZitadelBearerTokenAxiosInstance';
import type { Collection } from '@lychen/typescript-util-json-ld-hydra/types/Collection';
import type { Resource } from '@lychen/typescript-util-json-ld-hydra/types/Resource';
import { type AxiosRequestConfig, type AxiosResponse } from 'axios';

class LandRepository<T extends Resource = Land> extends Repository<T> {
  async getCollectionLookingForMember(
    config?: AxiosRequestConfig,
  ): Promise<AxiosResponse<Collection<T>>> {
    return await this.axiosInstance.get<Collection<T>>(
      this.urlExtension + '/looking_for_member',
      config,
    );
  }
}

export default new LandRepository(axiosInstance, 'lands');
