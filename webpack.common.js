"use strict";

const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    entry: {
        vendor: "./src/js/vendor.js",
        main: "./src/js/index.js",
    },
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "dist"),
        clean: true,
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
        new HtmlWebpackPlugin({
            filename: "users/profile.html",
            template: path.resolve(
                __dirname,
                "src/templates/users/profile.html"
            ),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "users/book-detail.html",
            template: path.resolve(
                __dirname,
                "src/templates/users/book-detail.html"
            ),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "users/activity.html",
            template: path.resolve(
                __dirname,
                "src/templates/users/activity.html"
            ),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "users/riwayat-pinjam.html",
            template: path.resolve(
                __dirname,
                "src/templates/users/riwayat-pinjam.html"
            ),
            minify: false,
        }),
        new HtmlWebpackPlugin({
            filename: "users/favorit.html",
            template: path.resolve(
                __dirname,
                "src/templates/users/favorit.html"
            ),
            minify: false,
        }),
    ],
};
