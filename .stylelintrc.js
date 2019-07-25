module.exports = {
  'extends': 'stylelint-config-standard',
  'rules': {
    'no-empty-source': null,
    'no-descending-specificity': null,
    'string-quotes': 'double',
    'media-feature-name-no-unknown': [
      true,
      {
        'ignoreMediaFeatureNames': [
          'prefers-reduced-motion'
        ]
      }
    ],
    'at-rule-no-unknown': [
      true,
      {
        'ignoreAtRules': [
          'extend',
          'at-root',
          'custom-media',
          'debug',
          'warn',
          'error',
          'if',
          'else',
          'for',
          'each',
          'while',
          'mixin',
          'include',
          'content',
          'return',
          'function',
          'tailwind',
          'apply',
          'responsive',
          'variants',
          'screen',
        ],
      },
    ],
  },
};
