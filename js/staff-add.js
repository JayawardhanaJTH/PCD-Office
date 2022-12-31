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

  // alert(JSON.stringify(dt));

  if (first_name == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill First Name",
    });
  } else if (last_name == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Last Name",
    });
  } else if (username == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Username",
    });
  } else if (email == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Email",
    });
  } else if (nic == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter NIC number",
    });
  } else if (gender == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Select Gender",
    });
  } else if (contact_number == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Contact Number",
    });
  } else if (address == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Address",
    });
  } else if (password == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Password",
    });
  } else {
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
