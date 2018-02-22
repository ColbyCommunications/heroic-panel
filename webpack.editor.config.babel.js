import path from 'path';
import ExtractTextPlugin from 'extract-text-webpack-plugin';

import packageJson from './package.json';

const main = () => {
  const PROD = process.argv.includes('-p');
  const min = PROD ? '.min' : '';
  const entry = {
    [`${packageJson.name}-editor`]: [
      './src/js/editor/index.js',
      './src/css/editor.css',
    ],
  };
  const filename = `[name]${min}.js`;

  const plugins = [new ExtractTextPlugin(`[name]${min}.css`)];

  return {
    entry,
    output: {
      filename,
      path: path.resolve(__dirname, 'dist'),
    },
    plugins,
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['react', 'env', 'stage-0'],
              plugins: [
                [
                  'transform-runtime',
                  {
                    helpers: false,
                    polyfill: false,
                    regenerator: true,
                  },
                ],
              ],
            },
          },
        },
        {
          test: /\.css$/,
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: ['css-loader'],
          }),
        },
      ],
    },
  };
};

export default main;
