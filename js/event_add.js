function validateForm(){
    var event_name = $("#event_name").val();
    var event_date = $("#event_date").val();
    var event_image = document.getElementById("event_image");
    var event_description = $("#event_description").val();
    
    
    if(event_name == ""){
        error_popup('Please Fill Event Name');
        return false;
    }
    else if(event_date == ""){
        error_popup('Please Fill Event Date');
        return false;
    }
    else if(event_description == ""){
        error_popup('Please Fill Event Description');
        return false;
    }
    else if('files' in event_image){
        if(event_image.files.length == 0 ){
            error_popup('Please Select a file');
            return false;
        }
        
    }

}
$("#event_save").click(function(){
    
    var event_name = $("#event_name").val();
    var event_date = $("#event_date").val();
    var event_image = document.getElementById("event_image");
    var event_description = $("#event_description").val();

    
    if(event_name == ""){
        error_popup('Please Fill Event Name');
    }
    else if(event_date == ""){
        error_popup('Please Fill Event Date');
    }
    else if(event_description == ""){
        error_popup('Please Fill Event Description');
    }
    else if('files' in event_image){
        if(event_image.files.length == 0 ){
            error_popup('Please Select a file');
        }
        
    }
});