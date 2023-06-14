const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    entry: {
        vendor: "./src/vendor.js",
        main: "./src/index.js",
    },
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "dist"),
        library: "Jar",
    },
    plugins: [
        new CopyPlugin({
            patterns: [{ from: "src/images", to: "images" }],
        }),
        new HtmlWebpackPlugin({
            filename: "index.html",
            template: path.resolve(__dirname, "src/templates/index.html"),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "auth/login.html",
            template: path.resolve(__dirname, "src/templates/auth/login.html"),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "admin/books.html",
            template: path.resolve(__dirname, "src/templates/admin/books.html"),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "admin/users.html",
            template: path.resolve(__dirname, "src/templates/admin/users.html"),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "admin/lend-books.html",
            template: path.resolve(
                __dirname,
                "src/templates/admin/lend-books.html"
            ),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "users/index.html",
            template: path.resolve(__dirname, "src/templates/users/index.html"),
            minify: false,
        }),
    ],
};
