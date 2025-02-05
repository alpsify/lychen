import { Repository } from '@lychen/typescript-util-api/classes/Repository';
import axiosInstance from '@lychen/typescript-util-api/ZitadelBearerTokenAxiosInstance';
import type { Resource } from '@lychen/typescript-util-json-ld-hydra/types/Resource';
import type { LandTask } from '../model/LandTask';

class LandTaskRepository<T extends Resource = LandTask> extends Repository<T> {}

export default new LandTaskRepository(axiosInstance, 'land_tasks');
