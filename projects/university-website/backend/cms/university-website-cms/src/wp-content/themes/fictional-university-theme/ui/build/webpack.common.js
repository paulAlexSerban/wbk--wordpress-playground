const dotenv = require('dotenv');
dotenv.config();

const path = require('path');
const configs = require('./configs');
const loaders = require('./loaders');
const plugins = require('./plugins');
const utils = require('./utils');
const { getEntries } = utils;
const { jsEntriesObj, scssEntriesObj } = getEntries();
const { paths } = configs;
const cwd = process.cwd();

// export webpack configuration
module.exports = {
    entry: {
        ...jsEntriesObj,
        ...scssEntriesObj,
    },
    resolve: {
        modules: [path.join(__dirname, '../node_modules')]
    },
    stats: {
        children: false,
        modules: false,
        chunks: false,
        chunkModules: false,
        chunkOrigins: false,
        entrypoints: false,
        assets: true,
        errors: true,
        warnings: true,
        colors: true,
        performance: false,
        timings: true,
        builtAt: true,
        hash: false,
        version: false,
    },
    output: {
        filename: ({ chunk }) => `${chunk.name}.js`,

        path: paths.DIST_DIR,
        publicPath: process.env.PUBLIC_PATH || '/',
        clean: true,
    },
    module: {
        rules: loaders,
    },
    plugins,
};
