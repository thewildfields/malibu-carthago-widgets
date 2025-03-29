const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    plugins: [
      new MiniCssExtractPlugin({
        filename: "bundle.css",
      }),
    ],
    entry: {
        'widget-scripts': '/assets/src/js/widget-scripts.js',
        'dealers-map': '/assets/src/js/dealers-map.js',
        'dealers-fetched-event': '/assets/src/js/dealers-fetched-event.js',
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