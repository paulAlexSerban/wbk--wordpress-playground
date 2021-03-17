const path = require("path")
const glob = require("glob");
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const TerserPlugin = require('terser-webpack-plugin');
const { CleanWebpackPlugin } = require("clean-webpack-plugin")
const { WebpackManifestPlugin } = require("webpack-manifest-plugin")

const options = { publicPath: "" };

let config = {
  entry: glob.sync('./theme.ui.ux/content/**/**/*.js').reduce((acc, item) => {
    const path = item.split("/");
    path.pop();
    const name = path.pop();
    acc[name] = item;
    return acc;
    /**
     * get each file found in ./theme.ui.ux/pages/any-directory-name/any-file.js
     * split the address to file for each forward slash and return the 'path' array
     * use pop to remove the last value, which is the name of the file.js
     * then use pop to return the file of the component directory which is going to be used as name for the bundles
     */
  }, {}),
  output: {
    filename: "scripts/[name].[chunkhash].bundle.js",
    path: path.resolve(__dirname, "../../build")
    /**
     * set the filename together with the path where the js bundles to be saved after compiling
     * set the save to directory to 'build'
     */
  },
  mode: "development",
  optimization: {
    minimize: true,
    minimizer: [new TerserPlugin()]
  },
  devServer: {
    before: function (app, server) {
      server._watch(["./**/*.php", "!./functions.php"])
    },
    hot: true,
    compress: true,
    writeToDisk: true
  },
  module: {
    rules: [{
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader, 'css-loader'
        ]
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'
        ]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/env'],
            plugins: ['@babel/plugin-proposal-class-properties']
          }
        }
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'styles/[name].[chunkhash].styles.css'
    }),
    new CleanWebpackPlugin(),
    new WebpackManifestPlugin(options)
  ]
}

module.exports = config