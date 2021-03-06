let mix = require('laravel-mix')

const sourcePath = 'development'
const distPath = 'web/assets'

mix.js(sourcePath + '/js/application.js', distPath + '/js')
    .sass(sourcePath + '/scss/application.scss', distPath + '/css')
    .options({
        processCssUrls: false
    })
    .sourceMaps()