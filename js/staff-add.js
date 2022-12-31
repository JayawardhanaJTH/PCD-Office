$("#add_staff").click(function () {
  var first_name = $("#firstName").val();
  var last_name = $("#lastName").val();
  var username = $("#username").val();
  var email = $("#email").val();
  var gender = $("#gender").val();
  var contact_number = $("#contactNumber").val();
  var address = $("#address").val();
  var password = $("#password").val();
  var nic = $("#nic").val();

  var valid = true;

  if (first_name == "") {
    error_popup("Please Enter First Name");
    valid = false;
  } else if (last_name == "") {
    error_popup("Please Enter Last Name");
    valid = false;
  } else if (username == "") {
    error_popup("Please Enter Username");
    valid = false;
  } else if (email == "") {
    error_popup("Please Enter Email");
    valid = false;
  } else if (!ValidateEmail(email)) {
    error_popup("You have entered an invalid email address!");
    valid = false;
  } else if (nic == "") {
    error_popup("Please Enter NIC number");
    valid = false;
  } else if (!validateNIC(nic)) {
    error_popup("Please Enter valid NIC number");
    valid = false;
  } else if (gender == "") {
    error_popup("Please Select Gender");
    valid = false;
  } else if (contact_number == "") {
    error_popup("Please Enter Contact Number");
    valid = false;
  } else if (!ValidateContact(contact_number)) {
    error_popup("Please Enter valid Contact Number");
    valid = false;
  } else if (address == "") {
    error_popup("Please Enter Address");
    valid = false;
  } else if (password == "") {
    error_popup("Please Generate Password");
    var password_input = document.getElementById("err-password");
    password_input.style.setProperty("display", "block");
    event.preventDefault();
    valid = false;
  }

  if (valid) {
    var id = "insert";
    var dt = {
      id: id,
      first_name: first_name,
      last_name: last_name,
      username: username,
      email: email,
      gender: gender,
      contact_number: contact_number,
      address: address,
      password: password,
      nic: nic,
    };

    $.ajax({
      url: "php/staff-add.php",
      method: "POST",
      data: dt,
      success: function (msg) {
        if (msg == 1) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Staff has been saved",
            showConfirmButton: false,
            timer: 2500,
          });

          window.location.href = "staff-list.php";
          staff_load();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Oops...",
            text: "Save Failed!",
          });
        }
      },
      error: function (request, error) {
        alert("Request " + JSON.stringify(error));
      },
    });
  }
});

function staff_load() {
  var id = "show";

  $.ajax({
    url: "php/staff-add.php",
    type: "POST",
    cache: false,
    data: { id: id },
    success: function (data) {
      $("#table").html(data);
    },
    error: function (request, error) {
      alert("Request: " + JSON.stringify(request));
    },
  });
}

$(document).ready(function () {
  staff_load();
});

function ValidateEmail(email) {
  var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
  if (email.match(mailFormat)) {
    return true;
  } else {
    return false;
  }
}

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
