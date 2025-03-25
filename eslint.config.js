import globals from 'globals';
import pluginJs from '@eslint/js';
import tseslint from 'typescript-eslint';
import pluginVue from 'eslint-plugin-vue';
import eslintConfigPrettier from 'eslint-config-prettier';
import importPlugin from 'eslint-plugin-import';
import eslintPluginUnicorn from 'eslint-plugin-unicorn';
import markdown from '@eslint/markdown';
import checkFile from 'eslint-plugin-check-file';
import eslintPluginYml from 'eslint-plugin-yml';

export default [
  {
    ignores: [
      '*.min.js',
      '*.map',
      '*.snap',
      '**/build/**',
      '**/dist/**',
      '**/.nuxt/**',
      '**/cache/**',
      '.github',
      '**/*.mts',
      '**/generated/**',
    ],
  },
  {
    plugins: {
      unicorn: eslintPluginUnicorn,
      'check-file': checkFile,
    },
  },
  { languageOptions: { globals: globals.node } },
  pluginJs.configs.recommended,
  ...tseslint.configs.recommended,
  ...pluginVue.configs['flat/recommended'],
  eslintConfigPrettier,
  importPlugin.flatConfigs.recommended,
  ...markdown.configs.processor,
  ...eslintPluginYml.configs['flat/recommended'],
  {
    files: ['**/*.vue'],
    languageOptions: { parserOptions: { parser: tseslint.parser } },
  },
  {
    files: ['**/compose.*.yml', '**/compose.yml'],
    rules: {
      'yml/no-empty-mapping-value': ['off'],
    },
  },
  {
    rules: {
      'no-console': 'error',
      'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
      'import/no-default-export': 'off',
      'import/first': 'error',
      'import/newline-after-import': 'error',
      'import/no-duplicates': 'error',
      'import/no-unresolved': 'off', //Need eslint-import-resolver-typescript, waiting for flatconfig and error fix on package side
      'func-style': ['error', 'declaration'],
      'vue/multi-word-component-names': 'off',
      '@typescript-eslint/no-empty-object-type': [
        'error',
        { allowInterfaces: 'with-single-extends' },
      ],
      '@typescript-eslint/no-unused-vars': 'off',
      'check-file/filename-naming-convention': [
        'error',
        {
          '**/*.vue': 'PASCAL_CASE',
          //"**/!(*.config).{js,ts}": "PASCAL_CASE",
        },
      ],
      'check-file/folder-naming-convention': [
        'error',
        {
          'components/**/': 'KEBAB_CASE',
        },
      ],
      'yml/sort-keys': ['error'],
      'yml/file-extension': ['error', { extension: 'yml' }],
      'yml/block-sequence': 'error',
      'yml/no-multiple-empty-lines': ['error', { max: 1 }],
      'yml/quotes': ['error', { prefer: 'single', avoidEscape: true }],
      'yml/sort-sequence-values': ['error', { order: { type: 'asc' }, pathPattern: '^dependsOn$' }],
      'yml/no-empty-sequence-entry': ['error'],
      //'tailwindcss/no-custom-classname': 'off',
      //'tailwindcss/classnames-order': 'off',
    },
  },
];
