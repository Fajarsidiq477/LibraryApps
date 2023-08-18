const { merge } = require("webpack-merge");
const common = require("./webpack.common");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const autoprefixer = require("autoprefixer");

module.exports = merge(common, {
    mode: "production",
    optimization: {
        minimize: false,
        minimizer: [new CssMinimizerPlugin()],
    },
    module: {
        rules: [
            {
                test: /\.(scss)$/i,

                use: [
                    {
                        // Adds CSS to the DOM by injecting a `<style>` tag
                        loader: MiniCssExtractPlugin.loader,
                    },
                    {
                        // Interprets `@import` and `url()` like `import/require()` and will resolve them
                        loader: "css-loader",
                    },
                    {
                        // Loader for webpack to process CSS with PostCSS
                        loader: "postcss-loader",
                        options: {
                            postcssOptions: {
                                plugins: [autoprefixer],
                            },
                        },
                    },
                    {
                        // Loads a SASS/SCSS file and compiles it to CSS
                        loader: "sass-loader",
                    },
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "bundle.[contenthash].css",
        }),

        new CleanWebpackPlugin(),
    ],
});
