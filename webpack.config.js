const path = require("path")
const glob = require("glob");
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const { CleanWebpackPlugin } = require("clean-webpack-plugin")

let config = {
  entry: glob.sync("./themelibs/pages/**/*.js").reduce((acc, item) => {
    const path = item.split("/");
    path.pop();
    const name = path.pop();
    acc[name] = item;
    return acc;
  }, {}),
  output: {
    filename: "scripts/[name].bundle.js",
    path: path.resolve(__dirname, "build")
  },
  mode: "development",
  module: {
    rules: [{
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'
        ]
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'
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
      filename: 'styles/[name].styles.css'
    }),
    new CleanWebpackPlugin()
  ]
}

module.exports = config