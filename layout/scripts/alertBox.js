function alertBox(msg, btn){

    var alertBox = $('#alert');

    alertBox.find('.message').text(msg);
    alertBox.find('.btn').unbind().click(function() {
        alertBox.hide();
    });

    alertBox.find('.btn').click(btn);
    alertBox.show();
}

function alert_Fun() { 
    setTimeout(function() { 
        $('#alert').fadeOut('fast'); 
    }, 1000); 
} 