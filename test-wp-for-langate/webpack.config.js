'use strict';

  let path = require('path');
  
  module.exports = {
    mode: 'production',
    entry: './src/index.js',
    output: {
      filename: 'main.js',
      path: __dirname + '/js'
    },
    watch: true,
  
    devtool: "source-map"
  };