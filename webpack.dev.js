const path = require("path");
const { merge } = require("webpack-merge");
// const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const common = require("./webpack.common");
const autoprefixer = require("autoprefixer");

module.exports = merge(common, {
    mode: "development",
    module: {
        rules: [
            {
                test: /\.(scss)$/i,

                use: [
                    {
                        // Adds CSS to the DOM by injecting a `<style>` tag
                        loader: "style-loader",
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
    devtool: "inline-source-map",
    devServer: {
        static: path.resolve(__dirname, "dist"),
        open: true,
        port: 9000,
        client: {
            overlay: {
                errors: true,
                warnings: false,
            },
        },
        compress: true,
    },
});
