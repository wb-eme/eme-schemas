const env = process.env.BABEL_ENV || 'cjs';

const presets = [];

const plugins = [
  [
    'module-resolver',
    {
      root: [
        './build/js/src',
      ],
      alias: {
        '@wbeme/schemas': './build/js/src',
      },
    },
  ],
];

switch (env) {
  case 'cjs':
    presets.push([
      'env',
      {
        targets: {
          node: [
            process.version,
          ],
        },
        modules: 'commonjs',
        useBuiltIns: true,
      },
    ]);

    plugins.push('transform-es2015-modules-commonjs');
    break;

  case 'es6':
    presets.push([
      'env',
      {
        targets: {
          node: [
            process.version,
          ],
        },
        modules: false,
        useBuiltIns: true,
      },
    ]);

    plugins.push('lodash');
    plugins.push('./build/js/use-lodash-es');
    break;

  default:
    break;
}

module.exports = {
  presets,
  plugins,
};
