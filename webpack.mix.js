let mix = require('laravel-mix');

mix.setPublicPath('./assets/')
    .autoload({
        'exports-loader?Alert!bootstrap/js/dist/alert': ['Alert'],
        'exports-loader?Button!bootstrap/js/dist/button': ['Button'],
        // 'exports-loader?Carousel!bootstrap/js/dist/carousel': ['Carousel'],
        'exports-loader?Collapse!bootstrap/js/dist/collapse': ['Collapse'],
        'exports-loader?Dropdown!bootstrap/js/dist/dropdown': ['Dropdown'],
        'exports-loader?Modal!bootstrap/js/dist/modal': ['Modal'],
        // 'exports-loader?Popover!bootstrap/js/dist/popover': ['Popover'],
        'exports-loader?Scrollspy!bootstrap/js/dist/scrollspy': ['Scrollspy'],
        'exports-loader?Tab!bootstrap/js/dist/tab': ['Tab'],
        // 'exports-loader?Tooltip!bootstrap/js/dist/tooltip': ['Tooltip'],
        'exports-loader?Util!bootstrap/js/dist/util': ['Util'],
    })
    .js('src/js/robok.js', 'js/robok.js')
    .sass('src/scss/robok.scss', 'css/robok.css')
    .disableNotifications();
