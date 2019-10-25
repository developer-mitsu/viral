// const MODE = "development";
const MODE = "production";
const webpack = require("webpack");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const fileName = MODE == "production" ? "[name]-[hash]" : "[name]";
// const FaviconsWebpackPlugin = require("favicons-webpack-plugin");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: MODE,
  entry: {
    main: "./src/js/main.js",
    contact: "./src/js/sub.js",
    curriculum: "./src/js/curriculum.js",
    student: "./src/js/student.js",
    privacy: "./src/js/privacy.js"
  },
  output: {
    filename: `js/${fileName}.js`,
    path: __dirname + "/docs"
  },
  devServer: {
    contentBase: "./dist"
  },
  module: {
    rules: [
      // {
      //   test: /\.css/,
      //   use: [
      //     MiniCssExtractPlugin.loader,
      //     {
      //       loader: "css-loader",
      //       options: {
      //         url: false
      //       }
      //     }
      //   ]
      // },
      {
        test: /\.scss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          {
            loader: "css-loader",
            options: {
              importLoaders: 2,
              // url: false
            }
          },
          {
            loader: "postcss-loader",
            options: {
              plugins: [
                require("autoprefixer")({
                  grid: true,
                  browsers: ["last 2 versions", "ie >= 11", "Android >= 4"]
                })
              ]
            }
          },
          "sass-loader"
        ]
      },
      {
        test: /\.ejs$/,
        use: [
          {
            loader: "extract-loader",
            options: {
              publicPath: "./dist"
            }
          },
          {
            loader: "html-loader",
            options: {
              attrs: ["img:src", ":data-src"],
            }
          },
          {
            loader: "ejs-compiled-loader"
          }
        ]
      },
      {
        test: /\.(gif|png|jpg|jpeg|ico)$/,
        use: [
          {
            loader: "url-loader",
            options: {
              limit: 51200,
              name: `${fileName}.[ext]`,
              outputPath: './img',
              publicPath: '../img/'
            }
          }
        ]
      },
      {
        test: /contact.php/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name]/[name].[ext]",
            }
          }
        ]
      },
      {
        test: /download.php/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "curriculum/[name].[ext]",
            }
          }
        ]
      },
      {
        test: /\.js$/,
        use: [
          {
            loader: "babel-loader",
            options: {
              presets: [["@babel/preset-env", { modules: false }]]
            }
          }
        ],
        exclude: /node_modules/
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
      chunkFilename: '[name].css',
    }),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery"
    }),
    new HtmlWebpackPlugin({
      chunks: ["main"],
      filename: "index.html",
      template: "src/main.ejs",
    }),
    new HtmlWebpackPlugin({
      chunks: ["contact"],
      filename: "contact/index.html",
      template: "src/contact/contact.ejs",
    }),
    new HtmlWebpackPlugin({
      chunks: ["curriculum"],
      filename: "curriculum/index.html",
      template: "src/curriculum/curriculum.ejs",
    }),
    new HtmlWebpackPlugin({
      chunks: ["privacy"],
      filename: "privacy/index.html",
      template: "src/privacy/privacy.ejs",
    }),
    new CleanWebpackPlugin()
  ]
};
