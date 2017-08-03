$(document).ready(function(){

    onClickRowTable('vehiculeTable');

    onClickRowTable('documentTable');

    function onClickRowTable(tableId){

        $('#' + tableId + ' tr').on('click', function(){

            //Récupérer la rangée cliquée
            //Récupérer l'input hidden ainsi que sa valeur (le lien)
            var row = $(this);
            var input = row.find('input');
            var document = input.val();

            //S'il n'y a pas d'input hidden, rester sur la même page
            // sinon rediriger vers le lien de la valeur du champ hidden

            if(input.length !== 1){
                location.href = window.location.pathname;
            }
            else{
                location.href = document;
            }
        });
    }
});