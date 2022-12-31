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

  if (update_first_name == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill First Name",
    });
  } else if (update_last_name == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Last Name",
    });
  } else if (update_username == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Username",
    });
  } else if (update_email == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Email",
    });
  } else if (update_nic == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please enter NIC number",
    });
  } else if (update_gender == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Select Gender",
    });
  } else if (update_contact_number == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill Contact Number",
    });
  } else if (update_address == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Please Fill NIC Number",
    });
  } else {
    $.ajax({
      url: "php/staff-add.php",
      method: "POST",
      data: dt,
      success: function (msg) {
        if (msg == 1) {
          staff_load();
          e.preventDefault();
          $("#staff_details_update").modal("hide");

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
