function getStaffDetails(
  staffId,
  first_name,
  last_name,
  username,
  email,
  gender,
  contact_number,
  address,
  nic
) {
  document.getElementById("update_staffId").value = staffId;
  document.getElementById("update_first_name").value = first_name;
  document.getElementById("update_last_name").value = last_name;
  document.getElementById("update_username").value = username;
  document.getElementById("update_email").value = email;
  document.getElementById("update_nic").value = nic;
  document.getElementById("update_gender").value = gender;
  document.getElementById("update_contact_number").value = contact_number;
  document.getElementById("update_address").value = address;
}

$("#update_staff_details").click(function (e) {
  var update_staffId = $("#update_staffId").val();
  var update_first_name = $("#update_first_name").val();
  var update_last_name = $("#update_last_name").val();
  var update_username = $("#update_username").val();
  var update_email = $("#update_email").val();
  var update_nic = $("#update_nic").val();
  var update_gender = $("#update_gender").val();
  var update_contact_number = $("#update_contact_number").val();
  var update_address = $("#update_address").val();

  var valid = true;

  if (update_first_name == "") {
    error_popup("Please Enter First Name");
    valid = false;
  } else if (update_last_name == "") {
    error_popup("Please Enter Last Name");
    valid = false;
  } else if (update_username == "") {
    error_popup("Please Enter Username");
    valid = false;
  } else if (update_email == "") {
    error_popup("Please Enter Email");
    valid = false;
  } else if (!ValidateEmail(update_email)) {
    error_popup("You have entered an invalid email address!");
    return false;
  } else if (update_nic == "") {
    error_popup("Please Enter NIC number");
    valid = false;
  } else if (!validateNIC(update_nic)) {
    error_popup("Please Enter valid NIC number");
    valid = false;
  } else if (update_gender == "") {
    error_popup("Please Select Gender");
    valid = false;
  } else if (update_contact_number == "") {
    error_popup("Please Enter Contact Number");
    valid = false;
  } else if (!ValidateContact(update_contact_number)) {
    error_popup("Please Enter valid Contact Number");
    valid = false;
  } else if (update_address == "") {
    error_popup("Please Enter Address");
    valid = false;
  }

  if (valid) {
    var id = "update";
    var dt = {
      id: id,
      update_staffId: update_staffId,
      update_first_name: update_first_name,
      update_last_name: update_last_name,
      update_username: update_username,
      update_email: update_email,
      update_nic: update_nic,
      update_gender: update_gender,
      update_contact_number: update_contact_number,
      update_address: update_address,
    };

    $.ajax({
      url: "php/staff-add.php",
      method: "POST",
      data: dt,
      success: function (msg) {
        if (msg == 1) {
          //load staff data
          staff_load();

          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Staff Details has been Updated",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Oops...",
            text: "Update Failed!",
          });
        }
      },
      error: function (request, error) {
        alert("Request " + JSON.stringify(error));
      },
    });
  }
});

function ValidateContact(contact) {
  var contactPattern = /^(\d{10})$/g;

  if (contact.match(contactPattern)) {
    return true;
  } else {
    //contact not match
    return false;
  }
}

function validateNIC(nic) {
  var nicPattern = /[0-9]{9}[A-Z|a-z]{1}$/g;
  if (nic.match(nicPattern)) {
    return true;
  } else {
    //nic not match
    return false;
  }
}

function ValidateEmail(email) {
  var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;

  if (email.match(mailFormat)) {
    return true;
  } else {
    //email not match
    return false;
  }
}
