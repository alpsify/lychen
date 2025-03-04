import { execSync } from 'child_process';
import path from 'path';
import { generateApi } from 'swagger-typescript-api';

async function main() {
  try {
    console.log('Start generating apis');

    // Get the OpenAPI schema path from the environment variable
    const openApiPath = process.env.OPENAPI_SCHEMA_JSON;

    if (!openApiPath) {
      throw new Error('OPENAPI_SCHEMA_JSON environment variable is not set.');
    }

    await generateApi({
      output: path.resolve('./generated'),
      input: path.resolve(openApiPath), // Use the path from the environment variable
      templates: path.resolve('./scripts/swagger/templates'),
      generateClient: true,
      httpClientType: 'fetch',
      modular: true,
      cleanOutput: true,
      defaultResponseAsSuccess: false,
      generateRouteTypes: false,
      generateResponses: true,
      toJS: false,
      extractRequestParams: true,
      extractRequestBody: true,
      extractEnums: true,
      unwrapResponseData: false,
      defaultResponseType: 'void',
      singleHttpClient: true,
      enumNamesAsValues: true,
      moduleNameFirstTag: true,
      generateUnionEnums: false,
      typePrefix: '',
      typeSuffix: '',
      enumKeyPrefix: '',
      enumKeySuffix: '',
      addReadonly: false,
      sortTypes: true,
      extractingOptions: {
        requestBodySuffix: ['Payload', 'Body', 'Input'],
        requestParamsSuffix: ['Params'],
        responseBodySuffix: ['Data', 'Result', 'Output'],
        responseErrorSuffix: ['Error', 'Fail', 'Fails', 'ErrorData', 'HttpError', 'BadResponse'],
      },
      extraTemplates: [],
      fixInvalidTypeNamePrefix: 'Type',
      fixInvalidEnumKeyPrefix: 'Value',
      primitiveTypeConstructs: (constructs) => ({
        ...constructs,
      }),
    });
    console.log('Api successfully generated');

    // Execute the index generation script
    console.log('Generating index.ts...');
    execSync('node --loader ts-node/esm ./scripts/generate-index.mts', {
      stdio: 'inherit',
    });
    console.log('Index.ts generated.');
  } catch (error) {
    console.error('Error during API generation:', error);
    process.exit(1); // Exit with an error code
  }
}

main();
