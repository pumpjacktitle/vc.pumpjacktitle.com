$(document).ready(function() {
    /*
     * Natural Sort algorithm for Javascript
     *  Version 0.2
     * Author: Jim Palmer (based on chunking idea from Dave Koelle)
     * Released under MIT license.
     */
    function naturalSort (a, b) {
            // setup temp-scope variables for comparison evauluation
            var x = a.toString().toLowerCase() || '', y = b.toString().toLowerCase() || '',
                    nC = String.fromCharCode(0),
                    xN = x.replace(/([-]{0,1}[0-9.]{1,})/g, nC + '$1' + nC).split(nC),
                    yN = y.replace(/([-]{0,1}[0-9.]{1,})/g, nC + '$1' + nC).split(nC),
                    xD = (new Date(x)).getTime(), yD = (new Date(y)).getTime();
            // natural sorting of dates
            if ( xD && yD && xD < yD )
                    return -1;
            else if ( xD && yD && xD > yD )
                    return 1;
            // natural sorting through split numeric strings and default strings
            for ( var cLoc=0, numS = Math.max( xN.length, yN.length ); cLoc < numS; cLoc++ )
                    if ( ( parseFloat( xN[cLoc] ) || xN[cLoc] ) < ( parseFloat( yN[cLoc] ) || yN[cLoc] ) )
                            return -1;
                    else if ( ( parseFloat( xN[cLoc] ) || xN[cLoc] ) > ( parseFloat( yN[cLoc] ) || yN[cLoc] ) )
                            return 1;
            return 0;
    }
     
    $.fn.dataTableExt.oSort['natural-asc']  = function(a,b) {
        return naturalSort(a,b);
    };
     
    $.fn.dataTableExt.oSort['natural-desc'] = function(a,b) {
        return naturalSort(a,b) * -1;
    };

    var oTable = $("#results-table").dataTable( {
        "bProcessing": true,
        "sAjaxSource": "{{ URL::to("vc/search/grid/$result->_id")}}",
        "sDom": "<'row'r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "sPaginationType": "bootstrap",
        "iDisplayLength": 10,
        "aaSorting": [[ 5, "asc" ]],
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 0,8,9,10 ] }
        ],
        "aoColumns": [
            { "mData": "actions", "sWidth": "2%", "sClass": "text-center" },
            { "mData": "book", "sType": "natural", "sWidth": "4%", "sClass": "text-center" },
            { "mData": "type", "sType": "natural", "sWidth": "6%" },
            { "mData": "number", "sType": "natural", "sWidth": "5%" },
            { "mData": "v", "sType": "natural", "sWidth": "3%" },
            { "mData": "p", "sType": "natural", "sWidth": "3%" },
            { "mData": "executed", "sType": "date", "sWidth": "3%" },
            { "mData": "filed", "sType": "date", "sWidth": "3%" },
            { "mData": "grantor", "sType": "natural", "sWidth": "14%" },
            { "mData": "grantee", "sType": "natural", "sWidth": "14%" },
            { "mData": "survey", "sType": "natural", "sWidth": "40%" }
        ],
        "bAutoWidth": false,
    });

    $('#filterInput').keyup(function(){
          oTable.fnFilter( $(this).val() );
    })

    $("#fixed_pagination").ready(function(){
        $(".dataTables_paginate").appendTo($("#fixed_pagination"));
    });

    $("#fixed_info").ready(function(){
        $("#results-table_info").appendTo($("#fixed_info"));
    });

    var oTable = $("#results-table").dataTable( {
        "bProcessing": true,
        "sAjaxSource": "{{ URL::to("vc/search/grid/$result->_id")}}",
        "sDom": "<'row'r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "sPaginationType": "bootstrap",
        "iDisplayLength": 10,
        "aaSorting": [[ 5, "asc" ]],
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 0,8,9,10 ] }
        ],
        "aoColumns": [
            { "mData": "actions", "sWidth": "2%", "sClass": "text-center" },
            { "mData": "book", "sType": "natural", "sWidth": "4%", "sClass": "text-center" },
            { "mData": "type", "sType": "natural", "sWidth": "6%" },
            { "mData": "number", "sType": "natural", "sWidth": "5%" },
            { "mData": "v", "sType": "natural", "sWidth": "3%" },
            { "mData": "p", "sType": "natural", "sWidth": "3%" },
            { "mData": "executed", "sType": "date", "sWidth": "3%" },
            { "mData": "filed", "sType": "date", "sWidth": "3%" },
            { "mData": "grantor", "sType": "natural", "sWidth": "14%" },
            { "mData": "grantee", "sType": "natural", "sWidth": "14%" },
            { "mData": "survey", "sType": "natural", "sWidth": "40%" }
        ],
        "bAutoWidth": false,
    });

    $('#filterInput').keyup(function(){
          oTable.fnFilter( $(this).val() );
    })

    $("#fixed_pagination").ready(function(){
        $(".dataTables_paginate").appendTo($("#fixed_pagination"));
    });

    $("#fixed_info").ready(function(){
        $("#results-table_info").appendTo($("#fixed_info"));
    });
});
