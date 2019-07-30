# Platform Cooperativism Consortium

[![License](https://badgen.net/badge/license/BSD-3-Clause/blue)](https://github.com/platform-coop-toolkit/pcc/blob/master/LICENSE.md) [![Status](https://badgen.net/github/status/platform-coop-toolkit/pcc)](https://circleci.com/gh/platform-coop-toolkit/pcc/tree/master) [![GitHub Release](https://badgen.net/github/release/platform-coop-toolkit/pcc)](https://github.com/platform-coop-toolkit/pcc/releases/latest)

WordPress theme for the Platform Cooperativism Consortium, based on [Sage](https://roots.io/sage/).

## Development

See [Sage 9 docs](https://roots.io/sage/docs/) for basic information. Commands for development:

- `yarn`: Install CSS and JavaScript dependencies
- `yarn build`: Build front-end assets
- `yarn build:production`: Build front-end assets for production
- `yarn start`: Start watching assets and rebuild on save (with BrowserSync live reloading)
- `yarn lint`: Check CSS and JavaScript coding standards
- `composer install`: Install PHP dependencies
- `composer standards`: Check PHP coding standards

The Platform Cooperativism Consortium theme uses [CSS with PostCSS](https://postcss.org/) instead of SCSS, and includes the [sage-directives](https://github.com/Log1x/sage-directives) and [blade-svg-sage](https://github.com/Log1x/blade-svg-sage) Composer packages.
