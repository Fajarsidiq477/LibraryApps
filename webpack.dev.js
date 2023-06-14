const path = require("path");
const { merge } = require("webpack-merge");
// const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const common = require("./webpack.common");

module.exports = merge(common, {
    mode: "development",
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,

                use: ["style-loader", "css-loader", "sass-loader"],
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
                warnings: true,
            },
        },
        compress: true,
    },
});
