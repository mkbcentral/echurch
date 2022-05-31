require('./bootstrap');
require('admin-lte');

global.moment = require('moment'); // require
require('tempusdominus-bootstrap-4')

window.toastr = require('toastr');

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
