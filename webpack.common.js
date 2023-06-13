const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    entry: "./src/index.js",
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, "dist"),
        library: "Jar",
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: ["style-loader", "css-loader", "sass-loader"],
            },
        ],
    },
    plugins: [
        new CopyPlugin({
            patterns: [{ from: "src/images", to: "images" }],
        }),
        new HtmlWebpackPlugin({
            filename: "index.html",
            template: path.resolve(__dirname, "src/templates/index.html"),
        }),
        new HtmlWebpackPlugin({
            filename: "auth/login.html",
            template: path.resolve(__dirname, "src/templates/auth/login.html"),
        }),
        new HtmlWebpackPlugin({
            filename: "admin/books.html",
            template: path.resolve(__dirname, "src/templates/admin/books.html"),
        }),
        new HtmlWebpackPlugin({
            filename: "admin/users.html",
            template: path.resolve(__dirname, "src/templates/admin/users.html"),
        }),
        new HtmlWebpackPlugin({
            filename: "admin/lend-books.html",
            template: path.resolve(
                __dirname,
                "src/templates/admin/lend-books.html"
            ),
        }),
        new HtmlWebpackPlugin({
            filename: "users/index.html",
            template: path.resolve(__dirname, "src/templates/users/index.html"),
        }),
    ],
};
