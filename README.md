for cross-env error:

package.json paste this

{
  "private": true,
  "scripts": {
    "dev": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "watch": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --watch --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "watch-poll": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --watch --watch-poll --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
    "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
  },
  "devDependencies": {
    "axios": "^0.15.3",
    "bootstrap-sass": "^3.3.7",
    "cross-env": "^3.2.3",
    "jquery": "^3.1.1",
    "laravel-mix": "^0.8.1",
    "lodash": "^4.17.4",
    "vue": "^2.1.10"
  }
}
npm install --save-dev cross-env
npm install


for popper warning:

npm install bootstrap@4.0.0-beta -D
npm install jquery -D
npm install popper.js -D
