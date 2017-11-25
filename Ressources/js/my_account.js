$(function(){
    click();
    mdp();
    email();
    register();
});

function click(){
    $(".panel nav ul li ul").hide();
    $(".panel nav ul li.up").click(function(){
        $('li.down').attr('class', 'up');
        $(this).attr('class', 'down');
        $(".panel nav ul li.up ul").slideUp();
        $('li.down').children(".panel nav ul").slideDown();
    });
    
}

function mdp(){
    $('#mdp').click(function() {
      $('#view').load('change_mdp.view.php', function() {});
    });
}

function email(){
    $('#email').click(function() {
      $('#view').load('change_email.view.php', function() {});
    });
}

function register(){
    $('#register').click(function() {
      $('#view').load('register_class.view.php', function() {});
    });
}