let path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin"),
  BrowserSyncPlugin = require("browser-sync-webpack-plugin"),
  webpack = require("webpack"),
  // change these variables to fit your project
  outputPath = "./dist",
  scriptsPath = "./assets/scripts/",
  localDomain = "http://localhost:8000",
  entryPoints = {
    app: scriptsPath + "/app.js",
    home: scriptsPath + "/home.js",
  };

module.exports = {
  mode: "development",
  //   mode: "production",

  externals: {
    $: "jquery",
    jQuery: "jquery",
  },

  entry: entryPoints,

  output: {
    path: path.resolve(__dirname, outputPath),
    filename: "[name].js",
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),

    // Uncomment this if you want to use CSS Live reload
    new BrowserSyncPlugin(
      {
        proxy: localDomain,
        files: [
          outputPath + "/*.css",
          outputPath + "/*.js",
          "./**/*.php",
          "./**/*.sass",
        ],
        injectCss: true,
      },
      { reload: false }
    ),

    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          {
            loader: "sass-loader",
            options: {
              sassOptions: { indentedSyntax: true },
            },
          },
        ],
      },
      {
        test: /\.js$/,
        enforce: "pre",
        use: ["source-map-loader"],
      },
    ],
  },
};
