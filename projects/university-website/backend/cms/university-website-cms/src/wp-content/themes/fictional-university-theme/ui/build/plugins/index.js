// const ESLintPlugin = require('eslint-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const webpack = require('webpack');

const utils = require('../utils');
const { getEntries } = utils;


const plugins = [
    // use eslint to lint JavaScript code
    // new ESLintPlugin(),
    // extract CSS styles into separate files
    new MiniCssExtractPlugin({
        filename: (obj) => {
            return `${obj.chunk.name}.css`;
        },
    }),
    // show progress during build process
    new webpack.ProgressPlugin(),
];

module.exports = plugins;
