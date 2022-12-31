function validateForm(){
    var bName = $('#bName').val();
    var bform = $('#bForm').val();
    var bAddress = $('#bAddress').val();
    var bDate = $('#bDate').val();
    var bCount = $('#bCount').val();
    // var bSubName = $('#bSubName').val();
    var bOwnerAddress = $('#bOwnerAddress').val();
    var bContact = $('#bContact').val();
    var bCitizenship = $('#bCitizenship').val();
    var bEmail = $('#bEmail').val();
    var bOwnership = $('#bOwnership').val();
    var bDivision = $('#bDivision').val();

    if(bName == ""){
        error_popup('Please Fill Business Name');
        return false;
    }
    else if(bform == ""){
        error_popup('Please Fill Business Formation');
        return false;
    }
    else if(bAddress == ""){
        error_popup('Please Fill Business Address');
        return false;
    }
    else if(bDate == ""){
        error_popup('Please Fill Business Start Date');
        return false;
    }
    else if(bCount == ""){
        error_popup('Please Fill Business Employee Count');
        return false;
    }
    // else if(bSubName == ""){
    //     error_popup('Please Fill Sub Business');
    // }
    else if(bOwnerAddress == ""){
        error_popup('Please Fill Business Owner Address');
        return false;
    }
    else if(bContact == ""){
        error_popup('Please Fill Business Contact');
        return false;
    }
    else if(bCitizenship== ""){
        error_popup('Please Fill Business Owner Citizenship');
        return false;
    }
    else if(bEmail == ""){
        error_popup('Please Fill Business Email');
        return false;
    }
    else if(bOwnership == ""){
        error_popup('Please Fill Business Place Ownership');
        return false;
    }
    else if(bDivision == ""){
        error_popup('Please Fill Business Grama Niladhari Division');
        return false;
    }

};
function validateForm2(){
    var fullName = $('#fullName').val();
    var division = $('#division').val();
    var address = $('#address').val();
    var contact = $('#Contact').val();
    var email = $('#email').val();
    var requirement = $('#requirement').val();
    var nic = $('#nic').val();
    var gender = $('#gender').val();

    if(fullName == ""){
        error_popup('Please Fill Full Name');
        return false;
    }
    else if(division == ""){
        error_popup('Please Fill Grama Niladhari Division');
        return false;
    }
    else if(address == ""){
        error_popup('Please Fill Address');
        return false;
    }
    else if(contact == ""){
        error_popup('Please Fill Contact Details');
        return false;
    }
    else if(email == ""){
        error_popup('Please Fill Email');
        return false;
    }
    else if(requirement == ""){
        error_popup('Please Fill Requirement');
        return false;
    }
    else if(nic == ""){
        error_popup('Please Fill NIC Number');
        return false;
    }
    else if(gender == ""){
        error_popup('Please Select Gender');
        return false;
    }
};