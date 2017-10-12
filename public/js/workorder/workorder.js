$(document).ready(function(){

    //Signature plugin
    var sigdiv = $("#signature");
    sigdiv.jSignature('init');

    //Click reset, clear canvas
    $('#signatureReset').on('click', function () {
        sigdiv.jSignature("reset", false);
    });




    function expandCollapses(){
        $('.panel-collapse').collapse('show');
        $('.panel-title').attr('data-toggle', '');
    }


    //Boucler à travers chaque input.  afficher ou cacher les rangées
    function showHideEmptyEdits(show){
        var input = $('table td input');
        input.each(function(index,value){
            var inputVal = $(this).val();
            var row = $(this).parents('tr').eq(0);
            if(inputVal == ""){
                if(show){
                    row.show();
                }
                else{
                    row.hide();
                }
            }
        });
    }

    //Chaque fois input qui a déjà une valeur est changé pour 0, le nombre est décrémenté
    //Chaque fois qu'un input a une valeur, le nombre est incrémenté

    $('table td input').on('blur', function(){

        var collapse = $(this).parents('div').eq(1).attr('id');
        var category = $(this).parents('div').eq(2).attr('id');
        var accordion = $(this).parents('div').eq(3).attr('id');

        var count = countValue(collapse);
        setBadge(accordion, category, count);
    });

    var active = true;

    //$('#accordion1').on('show.bs.collapse', function () {
      //  if (active) $('#accordion1 .in').collapse('hide');
    //});

    //$('#accordion2').on('show.bs.collapse', function () {
      //  if (active) $('#accordion2 .in').collapse('hide');
    //});

    //Pour chaque input du collapse qui a une valeur > 0
    function countValue(idCollapse){
        var count = 0;
        $('#' + idCollapse + ' div table td input').each(function () {
            var value = $(this).val();
            if(value > 0){
                count++;
            }
        });
        return count;
    }

    //Set le nombre d'input au badge
    function setBadge(accordion, idDiv, num){
        $("#" + accordion  + " #" + idDiv + " div.panel-heading h4.panel-title span.badge.pull-right").text(num);
    }

    //Selon le bouton cliqué, afficher les rangers si c'est le brouillion ou cacher celles qui sont à 0 si c'est le final
    $('#saveDraft').on('click',function(){
        active =  true;
        $('.panel-collapse').collapse('hide');
        $('.panel-title a').attr('data-toggle', 'collapse');
        showHideEmptyEdits(true);
    });

    $('#saveFinal').on('click',function(){
        active = false;
        $('.panel-title a').attr('data-toggle', 'false');
        $('#accordion1 .panel-collapse:not(".in")').collapse('show');
        $('#accordion2 .panel-collapse:not(".in")').collapse('show');
        showHideEmptyEdits(false);
    });

});