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
});