const { merge } = require("webpack-merge");
const common = require("./webpack.common");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = merge(common, {
    mode: "production",
    optimization: {
        minimize: false,
        minimizer: [new CssMinimizerPlugin()],
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,

                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
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
