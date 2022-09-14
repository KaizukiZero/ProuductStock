import _ from 'lodash';
window._ = _;

import $ from 'jquery';
window.$ = window.jQuery = $;

import Chart from 'chart.js/auto';
window.Chart = Chart;

import months from './utils';
window.months = months;   

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'bootstrap';

import './myjs';

