const Encore = require('@symfony/webpack-encore');

const front = require('./assets/front/webpack.config');

Encore.reset();

const back = require('./assets/back/webpack.config');

Encore.reset();

const common = require('./assets/common/webpack.config');

module.exports = [front,back,common];
