
$('document').ready(function()
{

    /* TABLE ROW CHECK SELECT FUNCTIONALITY */
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

    /* NOTIFICATION BADGES */
    $('span.badge:contains("0")').filter(function() {
        return $(this).text() === '0';
    }).css("display", "none");

    /* SELECT */
    $('select.search-select').select2({ placeholder: 'Select', allowClear: true});


    /* HANDLE CONTRACT FACILITY SELECT */
    facilityIds = Array();
    $('form #facility').on('change', function() {

        facilityId = $(this).val();
        facility = $(this).find('option').eq($(this)[0].selectedIndex).text();

        if (!facilityIds.includes(facilityId)) {
            facilityIds.push(facilityId);
        
            var o = {facilityId:facilityId, facility:facility};

            /* render */
            render(o);

            $('form #facilities-equipments .remove').on('click', function() {
                facility = $(this).parents('.form-group').find('input.hide').val();
                facilityIds.splice(facilityIds.indexOf(facility), 1);
                $(this).parents('.form-group').eq(0).remove();
            });
        }
        
        /* re-render */
        /* $('form #facilities-equipments').html('');
        for (i=0; i<objects.length; i++) {
            
        } */

    });

    function render(o) {

        HTML = '<div class="form-group" o="'+ o +'">'+
                  '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="spares_anticipated"><span class="required"></span>'+
                  '</label>'+
                  '<input class="hide" name="facility[]" value="'+ o.facilityId +'" />'+
                  '<div class="col-md-2 col-sm-2 col-xs-12">'+
                  '    <span>'+ o.facility +'</span>'+
                  '</div>'+
                  '<div class="col-md-6 col-sm-6 col-xs-12">'+
                  '    <select name="equipments['+ o.facilityId +'][]"  multiple="multiple" class="form-control search-select col-md-7 col-xs-12" required="required">'+
                        $('.f.hide select[name="equipments_hidden"]').html() +
                  '    </select>'+
                  '</div><div class="col-md-1 col-sm-1"><span class="fa fa-times remove" style="color: red; cursor: pointer;"></span></div>'+
              '</div>';

        $('form #facilities-equipments').prepend(HTML);
        $('form #facilities-equipments select.search-select:first').select2({ 
                placeholder: 'Select equipments for '+ o.facility, 
                allowClear: true});

    }



    

    /* INITIALIZE DATABASES */
    init_DataTables();

});

// page redirect on user click edit/delete/complete for equipment Inventory
function history(e,URL)
{
    e.preventDefault();
    $(e.target).parents('.x_panel').find('form')[0].action = URL;
    $(e.target).parents('.x_panel').find('form').eq(0).submit();
}
function edit_records(e,URL)
{
    e.preventDefault();
    $(e.target).parents('.x_panel').find('form')[0].action = URL;
    $(e.target).parents('.x_panel').find('form').eq(0).submit();
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
            $(e.target).parents('.x_panel').find('form')[0].action = URL;
            $(e.target).parents('.x_panel').find('form').eq(0).submit();
        }
    });
}

function viewDetails(e,URL) {
    if($(e.target).is("input"))return;
    window.location.assign(URL)
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function filter(e, table) {

    days = e.target.value;  
    var url = new URL(window.location.href);

    if (getParameterByName('d') == '') {
        // If your expected result is "http://foo.bar/?x=1&y=2&x=42"
        url.searchParams.append('d', days);
    } else
        // If your expected result is "http://foo.bar/?x=42&y=2"
        url.searchParams.set('d', days);

    window.location.href = url.href;

    return;
}

function exportToExcel(table) {

    TableExport.prototype.xlsx = {
        defaultClass: "xlsx",
        buttonContent: "Export to xlsx",
        mimeType: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        fileExtension: ".xlsx"
    };
    
    var myTable = table.tableExport({filename : 'Records File', formats : ["xlsx"], exportButtons : true});

}
function print(table, title) {

    styles = '<link href="library/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">';
    data =  styles +'<div>'+ title +'</div><table class="table table-bordered">'+ table.html() + '</table>';

    // data =  '<div>'+ title +'</div>'+ form.html();
    // data =  form[0].outerHTML;

    var hidden_IFrame = $('<iframe></iframe>').attr({
        width: '1px',
        height: '1px',
        display: 'none'
    }).appendTo($('body'));

    var myIframe = hidden_IFrame.get(0);

    var script_tag = myIframe.contentWindow.document.createElement("script");
    script_tag.type = "text/javascript";
    script = myIframe.contentWindow.document.createTextNode('function Print(){ window.print(); }');
    script_tag.appendChild(script);

    myIframe.contentWindow.document.body.innerHTML = data;
    myIframe.contentWindow.document.body.appendChild(script_tag);
    
    /* DYNAMICALLY HIDE ELEMENTS AND BUILD css */
    $(myIframe.contentWindow.document.body).find('.print-not').hide();
    console.log('Length, '+ $(myIframe.contentWindow.document.body).find('.print-not').length);
    console.log(data);
    $(myIframe.contentWindow.document.body).find('.table.print').css('width', '100%');
    $(myIframe.contentWindow.document.body).find('.table.print th, .table.print td').css('text-align', 'left');
    $(myIframe.contentWindow.document.body).find('.table.print a').css('text-decoration', 'none').css('color', 'black');
    
    myIframe.contentWindow.Print();
    hidden_IFrame.remove();
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


  function disablefield_maintenance() {
    if (document.getElementById('equipment_maintenance_Yes').checked ==1) {
      document.getElementById('maintenance_Description').disabled='disabled';
      document.getElementById('maintenance_Description').value='disabled';
    }
    else{
      document.getElementById('maintenance_Description').disabled='';
      document.getElementById('maintenance_Description').value='Give Details';

    }

}

   function disablefield_troubleshooting() {
    if (document.getElementById('equipment_troubleshooting_Yes').checked ==1) {
      document.getElementById('troubleshooting_Description').disabled='disabled';
      document.getElementById('troubleshooting_Description').value='disabled';
    }
    else{
      document.getElementById('troubleshooting_Description').disabled='';
      document.getElementById('troubleshooting_Description').value='Give Details';

    }

}

function disablefield_operation() {
    if (document.getElementById('status_Yes').checked ==1) {
      document.getElementById('Operation Description').disabled='disabled';
      document.getElementById('Operation Description').value='disabled';
    }
    else{
      document.getElementById('Operation Description').disabled='';
      document.getElementById('Operation Description').value='Give Details';

    }

}

function show(aval) {
    if (aval != "") {
    hiddenDiv.style.display='inline-block';
    Form.fileURL.focus();
    } 
    else{
    hiddenDiv.style.display='none';
    }
  }

