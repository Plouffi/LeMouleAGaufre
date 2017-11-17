$(document).ready(function () {
    var tabRep = [0, 0, 0, 0, 0];
    $('#val').click(function (e) {
        var nbQuest = 0;
        for (var i = 1; i < 6; i++) {
            nbQuest += parseInt($('.navbar-nav li:nth-child(' + i + ') b').text());
        }/*
        $('#validQuest').modal('show');
        $("#valider").click(function () {
            $("#formQuizz").submit();
        });*/
        if (nbQuest == 32) {
            $('#validQuest').modal('show');
            $("#valider").click(function () {
                $("#formQuizz").submit();
            });
        }
        else {
            $('#warning').modal('show');
        }
    });

    $(":checkbox").click(function () {
        countAnswer($(this).parent().parent().parent().parent().attr('id'));
    });

    function countAnswer(domain) {
        nb = domain.charAt(6);
        tabRep[nb] = 0;
        $.each($('#' + domain).find('.panel'), function () {
            if ($(this).find(':checkbox:checked').length > 0) {
                tabRep[nb] += 1;
            }
        });
        $('.navbar-nav li:nth-child(' + nb + ') b').text(tabRep[nb]);
    }

    //Fonction qui permet afficher seulement le domaine cliqué
    $(".nav-tabs a").click(function () {
        $(this).tab('show');
        $('html, body').animate({scrollTop: 0});
    });
});