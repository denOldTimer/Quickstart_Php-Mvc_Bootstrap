## Quickstart_Php-Mvc_Bootstrap !

[![Greenkeeper badge][greenkeeper-image]][greenkeeper-url] [![Build Status][travis-image]][travis-url] [![Dependencies][dep-image]][dep-url] [![devDependencies][devdep-image]][devdep-url]

Is an automated workflow with Npm & Webpack-Encore.
Upon build it will create a complete php-mvc distribution folder.
All you have to do is publish the contents of the dist folder into the root of your webser.

## How to use this project

-1 Clone the repo  
-2 Point the clone to your own repo  
-3 `npm install` -- run the command to install dependencies  
-4 Do your work in the 'src' directory  
-5 Commands build your dist folder.

- `npm run dev` -- wil do a one time dev run
- `npm run watch` -- wil run in the background and do a dev build upon file change
- `npm run build` -- wil do a one time build run and minify js and css files

Included in the Php-Mvc are:

- Routing via pattern's
- core classes for database handling via PDO
- Core classes for session handling
- translation via JSON files
- Stylint & ESLint

Included in the Bootstrap version.

- JQuery, Popper.js
- Bootstrap 4.3.1
- Bootswatch 4.3.1
- Font-awesome 5.8.1

`https://github.com/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap.git`

[greenkeeper-url]: https://greenkeeper.io/
[greenkeeper-image]: https://badges.greenkeeper.io/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap.svg?style=flat-square
[travis-url]: https://travis-ci.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap
[travis-image]: https://travis-ci.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap.svg?branch=master
[dep-url]: https://david-dm.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap
[dep-image]: https://david-dm.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap/status.svg?style=flat
[devdep-url]: https://david-dm.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap?type=dev
[devdep-image]: https://david-dm.org/ScorpioCoding/Quickstart_Php-Mvc_Bootstrap/dev-status.svg?style=flat

## Version Control

- 1.0.0 - Origin Version
- 2.0.0 - [30-04-2019] Dependency Updates
- 2.1.0 - [17-05-2019] Dependency Updates
- 2.1.1 - [18-05-2019] Webpack SingleRunTime Error

## Updates

- 2019-05-17
  1. Dependency Updates
     - @fortawesome/fontawesome-free ^5.3.1 → ^5.8.2
     - autoprefixer ^9.1.5 → ^9.5.1
     - bootstrap ^4.1.3 → ^4.3.1
     - bootswatch ^4.1.3 → ^4.3.1
     - eslint ^5.6.0 → ^5.16.0
     - eslint-plugin-import ^2.14.0 → ^2.17.2
     - eslint-plugin-node ^8.0.1 → ^9.0.1
     - eslint-plugin-promise ^4.0.1 → ^4.1.1
     - jquery ^3.3.1 → ^3.4.1
     - node-sass ^4.9.3 → ^4.12.0
     - popper.js ^1.14.4 → ^1.15.0
     - stylelint-config-standard ^18.2.0 → ^18.3.0
     - webpack-notifier ^1.6.0 → ^1.7.0
- 2019-05-18
  1.  Webpack SingleRuntime Error
