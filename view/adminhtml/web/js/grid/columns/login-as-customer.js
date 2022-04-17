/**
 * @api
 */
define([
    'Magento_Ui/js/grid/columns/column'
], function (Column) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'JBrada_LoginAsCustomerQuickLogin/grid/cells/login-as-customer'
        },

        /**
         * Check if Login as Customer disallowed for current row
         *
         * @param {Object} row
         * @returns {boolean}
         */
        isDisallowed: function (row) {
            return !this.isAllowed(row);
        },

        /**
         * Check if Login as Customer allowed for current row
         *
         * @param {Object} row
         * @returns {boolean}
         */
        isAllowed: function (row) {
            return !!row[this.index].allowed
        },

        /**
         * Get Label
         *
         * @param {Object} row
         * @returns {string}
         */
        getLabel: function (row) {
            return row[this.index].label
        },

        /**
         * OnClick handler for Login as Customer action
         *
         * @param {Object} row
         * @returns {string}
         */
        handleClickOnLogin: function (row) {
            // Disable "Edit" function on click
            event.preventDefault();
            event.stopPropagation();

            // Invoke Login as Customer login diaglog
            window.lacConfirmationPopup(row[this.index].lacUrl);
        },
    });
});
