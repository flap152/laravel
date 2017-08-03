$(document).ready(function(){

    $('#vehiculeTable tr').on('click', function (){

        var tableRow = $(this);
        var tableTd = tableRow.children();
        var vehiculeId = tableTd.eq(0).text();

        location.href = '/vehicule/' + vehiculeId + '/documents';
    });

    $('#documentTable tr').on('click', function(){

        var tableRow = $(this);
        var tableTd = tableRow.children('td');
        var vehiculeId = tableTd.eq(2).html();

        var documentId = tableTd.eq(0).html();

        location.href = '/vehicule/' + vehiculeId + '/document/' + documentId;
    });
});