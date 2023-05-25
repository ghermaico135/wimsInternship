/*<!-- =======================================================
Project Name: PROJECT MANAGEMENT SYSTEM 
Website URL: 
Author: 
Group:
======================================================= -->
 */
 $('document').ready(function()
{

    $(".select-all").click(function ()
    {
        state = this.checked;
        $('.chk-box').each(function () {
            this.checked = state;
        });

    });

    $(".chk-box").click(function()
    {
        if($(".chk-box").length == $(".chk-box:checked").length) {
            $(".select-all").attr("checked","checked");
        }else{
            $(".select-all").removeAttr("checked");
        }

        c = this.checked;
        $(this).parents('tr').find('.chk-box').each(function () {
            this.checked = c;
        });

    });

    $('span.badge:contains("0")').css("display", "none");
    $('select.search-select').select2({ placeholder: 'Select', allowClear: true});

    /* INITIALIZE DATABASES */
    init_DataTables();

});


//For select / deselect all under equipment


//Page redirect on user click edit/delete/complete for equipment Inventory
function history(e,URL)
{
    e.preventDefault();
    document.frm.action = URL;
    document.frm.submit();
}
function edit_records(e,URL)
{
    e.preventDefault();
    document.frm.action = URL;
    document.frm.submit();
}

function delete_records(e,URL)
{
    e.preventDefault();

    if(!$('.chk-box:checked').length) {
        return;
    }


    bootbox.confirm({
        animate: false,
        message: "Confirm this action",
        buttons: {
            confirm: {
                label: 'Delete',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(!result)return;
            document.frm.action = URL;
            document.frm.submit();
        }
    });
}

function viewDetails(e,URL) {
    if($(e.target).is("input"))return;
    window.location.assign(URL)
}

function exportToExcel(table) {

    TableExport.prototype.xlsx = {
        defaultClass: "xlsx",
        buttonContent: "Export to xlsx",
        mimeType: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        fileExtension: ".xlsx"
    };
    
    var myTable = table.tableExport({filename : 'file', formats : ["xlsx"], exportButtons : true});

}

/* DATA TABLE INITIALISING FUNCTION */
function init_DataTables() {
    if (typeof($.fn.DataTable) === 'undefined') {
        return;
    }
    var handleDataTableButtons = function() {
        if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }, ],
                responsive: true
            });
        }
    };
    TableManageButtons = function() {
        "use strict";
        return {
            init: function() {
                handleDataTableButtons();
            }
        };
    }();
    $('#datatable, table.datatable').dataTable({
        "language": {
            "lengthMenu": "_MENU_ records",
            "zeroRecords": "No records",
            "info": "Page _PAGE_",
            "infoEmpty": "No records",
            "search":"",
            "paginate": {
                "previous": "<i class='fa fa-chevron-left'><i/>",
                "next": "<i class='fa fa-chevron-right'><i/>"
            }
        }
    });
    $('#datatable .search').attr('placeholder', 'Search');
    $('#datatable-keytable').DataTable({
        keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
    });
    $('#datatable-fixed-header').DataTable({
        fixedHeader: true
    });
    var $datatable = $('#datatable-checkbox');
    $datatable.dataTable({
        "order": [
            [1, "asc"]
        ],
        "columnDefs": [{
            orderable: false,
            targets: [0]
        }]
    });
    $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search');
    $datatable.on('draw.dt', function() {
        $('checkbox input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    });
    TableManageButtons.init();
}

function alert(message, callback) {
    bootbox.alert({
        animate : false,
        message : message,
        callback : function() {
            callback();
        }
    });
}