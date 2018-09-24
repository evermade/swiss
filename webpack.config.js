// const glob = require('glob');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// paths
const ASSETS_DIR = path.resolve(__dirname, 'assets');
const SRC_DIR = `${ASSETS_DIR}/src`;
const DIST_DIR = `${ASSETS_DIR}/dist`;

// @TODO: block related javascript or css are not being included
// const BLOCK_DIR = path.resolve(__dirname, 'lib/blocks/');

const config = {
    mode: 'development',
    entry: `${SRC_DIR}/main.js`,
    output: {
        filename: '[name].js',
        path: DIST_DIR
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                loader: 'babel-loader',
            },
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                loader: 'eslint-loader'
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                ],
            },
            {
                test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/i,
                include: /node_modules/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?v=[hash]',
                        },
                    },
                ],
            },
            {
                test: /\.(jpe?g|png|gif|svg|ttf|otf|eot|woff(2)?)$/i,
                include: ASSETS_DIR,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            context: 'assets',
                            emitFile: false,
                            name: '[path][name].[ext]?v=[hash]',
                            publicPath: '../',
                        },
                    },
                ],
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.jsx', '.json'],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
    ],
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: true
            }),
            new OptimizeCssAssetsPlugin({
                cssProcessorPluginOptions: {
                    preset: ['default', { discardComments: { removeAll: true } }],
                },
            }),
        ],
    },
};

module.exports = config;
