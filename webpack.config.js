var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: './assets/js/app.js',
    output: {
        filename: './htdocs/js/bundle.js'
    },
    module: {
        loaders: [
            {
                test: /\.less$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!less-loader")
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader")
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin("./htdocs/css/bundle.css")
    ]
};
