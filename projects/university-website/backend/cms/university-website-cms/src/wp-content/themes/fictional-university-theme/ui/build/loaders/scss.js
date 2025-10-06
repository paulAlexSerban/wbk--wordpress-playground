const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const scss = {
    // use CSS and Sass loaders to compile CSS stylesheets
    test: /\.(sa|sc|c)ss$/,
    use: [
        MiniCssExtractPlugin.loader,
        'css-loader',
        {
            loader: 'sass-loader'
        },
    ],
};

module.exports = scss;
