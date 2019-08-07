//////////////////////////////////////////////////////
//  Template Name: octAdmin
//  Author: octathemes
//  Email: octathemes@gmail.com
//  File: table-datatable-example.js
///////////////////////////////////////////////////

$(function () {
    "use strict";

    $('.dataTable').DataTable({
        "scrollX": true
    });

    // Setup - add a text input to each footer cell
    $('#exampleTableSearch tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="Search ' + title + '" />');
    });

    // DataTable
    var table = $('#exampleTableSearch').DataTable({
        "scrollX": true
    });

    // Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });

    $('#exampleTableTools').DataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

});