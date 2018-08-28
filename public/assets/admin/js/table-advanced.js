var TableAdvanced = function () {

    var initHideShowColumn = function () {
        var table = $('#hide_show_column');
        var tableWrapper = $('#hide_show_column_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        var tableColumnToggler = $('#hide_show_column_column_toggler');
        var tableHeaderRow = $('#table-header-row');
        var columns = [];
        var colName;
        var ajaxUrl;

        $('input[type="checkbox"]', tableColumnToggler).each(function(index, el) {
            colName = $(el).attr('data-name');
            columns.push({
                "name": colName
            });
            $(el).attr("data-column", index);
            if (colName.indexOf('.') > 0) {
                colName = colName.substring(0, colName.indexOf('.'));
            }
            tableHeaderRow.append($('<th class="filter_' + colName + ' text-center">' + $(el).parent().parent().parent().text() + '</th>'));
        });
        columns.push({"name": ""});
        tableHeaderRow.append($('<th class="text-center">Action</th>'));

        if (typeof table.attr('data-url') !== 'undefined') {
            ajaxUrl = table.data('url');
        } else {
            ajaxUrl = window.location.href;
        }

        table.on('init.dt', function () {
            Index.init();
        });

        table.on('draw.dt', function () {
            Index.draw();
        });

        var oTable = table.DataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [-1]
            }],

            "columns": columns,
            "aaSorting": [],

            "lengthMenu": [
                [10, 25, 50, 100, 250, 500, 1000, -1],
                [10, 25, 50, 100, 250, 500, 1000, "All"] // change per page values here
            ],

            "serverSide": true,
            "processing": true,
            "ajax": {
                "url": ajaxUrl
            }
        });

        /* modify datatable control inputs */
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* init hidden column*/
        $('input[type="checkbox"]', tableColumnToggler).each(function(index, el) {
            var checked = el.checked;
            if (!checked) {
                var column = oTable.column(index);
                column.visible( ! column.visible() );
            }
        });

        /* handle show/hide columns*/
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var column = oTable.column($(this).attr("data-column"));
            column.visible( ! column.visible() );
        });

        $('.form-filter-submit').on('click', function (e) {
            e.preventDefault();
            submitFilter(oTable);
        });

        $('.form-filter-reset').on('click', function (e) {
            e.preventDefault();
            resetFilter(oTable);
        });
    }

    function submitFilter(table) {
        var query = [];
        var filterColumn; 
        var filterValue;
        // get all typeable inputs
        $('textarea.form-filter, select.form-filter, input.form-filter:not([type="radio"],[type="checkbox"])').each(function() {
            if ($(this).val()) {
                filterColumn = '__' + $(this).attr('name');
                filterValue = $(this).val();
                query.push(filterColumn + '=' + filterValue);
            }
        });

        // // get all checkboxes
        // $('input.form-filter[type="checkbox"]:checked', table).each(function() {
        //     the.addAjaxParam($(this).attr("name"), $(this).val());
        // });

        // // get all radio buttons
        // $('input.form-filter[type="radio"]:checked', table).each(function() {
        //     the.setAjaxParam($(this).attr("name"), $(this).val());
        // });

        table.settings().ajax.url('?'+query.join('&'));
        table.ajax.reload();
    }

    function resetFilter(table) {
        table.settings().ajax.url(window.location.href).load();
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }
            initHideShowColumn();
        }

    };

}();
