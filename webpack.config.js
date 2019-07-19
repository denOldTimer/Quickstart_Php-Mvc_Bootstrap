let Encore = require('@symfony/webpack-encore')
const CopyWebpackPlugin = require('copy-webpack-plugin')

Encore
  .setOutputPath('dist/')
  .setPublicPath('/')
  .cleanupOutputBeforeBuild()
  .disableSingleRuntimeChunk()
  .enableSassLoader(function (sassOptions) {}, {
    resolveUrlLoader: false
  })
  .enablePostCssLoader((options) => {
    options.config = {
      path: 'postcss.config.js'
    }
  })
  .autoProvidejQuery({
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
  })
  .addEntry('public/js/app', './src/public/js/app.js')
  .addStyleEntry('public/css/app', ['./src/public/scss/app.scss'])
  .addPlugin(new CopyWebpackPlugin([
    // copies to {output}/static
    {
      from: 'src',
      to: '../dist',
      toType: 'dir',
      ignore: ['*.js', '*.scss']
    }
  ]))
  // enables hashed filenames (e.g. app.abc123.css)
  // .enableVersioning(!Encore.isProduction())
  .enableBuildNotifications()
// .enableSourceMaps(!Encore.isProduction())

module.exports = Encore.getWebpackConfig()