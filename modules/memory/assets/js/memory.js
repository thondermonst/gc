$(function() {
    console.log('memory.js loaded');

    onLoadStuff();

    $('#start-button').on('click', function(e) {
        startGame();
    });

    function onLoadStuff() {
        //Set height for tabs
        $('.table td').each(function(x) {
            $(this).height($(this).width());
        });

        //Show table
        $('.table').css('visibility', 'visible');
    }

    function startGame() {
        console.log('game start');
        enableCards();

        //Disable start button
        $('#start-button').prop('disabled', true);
    }

    function disableCards() {
        $('.mask-image').off('click');
        $('.mask-image').css('cursor', 'none');
    }

    function enableCards() {
        $('.mask-image').on('click', function() {
            disableCards();
            $(this).animate({
                height: "toggle"
            }, 2000, function() {
                $(this).removeClass('closed-column');
                $(this).addClass('open-column');
                checkHiddenInfo(this);
            });
        });
        $('.mask-image').css('cursor', 'pointer');
    }

    function checkHiddenInfo(card) {
        if($('#hidden-info #card-info').html() == "") {
            $('#hidden-info #card-info').html($(card).attr('src'));
        } else {
            if($('#hidden-info #card-info').html() == $(card).attr('src')) {
                //couple found
                //remove masks
                var ocs = 0;
                $('.open-column').addClass('solved-column');
                $('.solved-column').removeClass('open-column');

                $('.solved-column').each(function(ocs) {
                    $(this + ' > .mask-info').remove();
                    ocs++;
                });
                //empty hidden-info
                checkForVictory(ocs);
            } else {
                //not couple
                $('.open-column').animate({
                    height: "toggle"
                },2000, function() {});
                $('.open-column').addClass('closed-column');
                $('.closed-column').removeClass('open-column');
            }

            $('#hidden-info #card-info').html('');
            enableCards();
        }
    }

    function checkForVictory(ocs) {
        if(ocs == 20) {
            finishGame();
        }
    }

    function finishGame() {
        //Redirect to memory/play/score
    }
});