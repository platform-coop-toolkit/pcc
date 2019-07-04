/* eslint-disable */
const cssnanoConfig = {
  preset: ['default', { discardComments: { removeAll: true } }]
};

module.exports = ({ file, options }) => {
  return {
    parser: options.enabled.optimize ? 'postcss-safe-parser' : undefined,
    plugins: {
      'postcss-import': {},
      'postcss-partial-import': {},
      'postcss-custom-media': {},
      'postcss-custom-properties': {
        importFrom: './resources/assets/styles/common/_properties.css',
        preserve: false,
      },
      'postcss-calc': {},
      autoprefixer: true,
      cssnano: options.enabled.optimize ? cssnanoConfig : false,
    },
  };
};
