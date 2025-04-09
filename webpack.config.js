const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    plugins: [
      new MiniCssExtractPlugin({
        filename: "[name].css",
      }),
    ],
    entry: {
        'search-widget': '/assets/src/js/search-widget.js',
        'dealers-map-widget': '/assets/src/js/dealers-map-widget.js',
        'dealers-search-results-widget': '/assets/src/js/dealers-search-results-widget.js',
        'widgets-init': '/assets/src/js/widgets-init.js',
    },
    output: {
        path: path.resolve( __dirname, 'assets/build' ),
        filename: '[name].js',
        clean: true
    },
    module: {
        rules: [
            {
                test: /\.(sa|sc)ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "sass-loader",
                ],
            }
        ]
    }
}