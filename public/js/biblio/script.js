$(document).ready(function(){

    onClickRowTable('vehiculeTable');

    onClickRowTable('documentTable');

    function onClickRowTable(tableId){

        $('#' + tableId + ' tr').on('click', function(){

            var row = $(this);
            var lien = row.find('input').val();

            location.href = lien;
        });
    }
    $('.panel.panel-default.text-center').on('click', function(){
        var panel = $(this);

        var lien = panel.find('a').attr('href');

        location.href = lien;
    });
});