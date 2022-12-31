function validateRegistration() {
  var firstname = $("#firstname").val();
  var lastname = $("#lastname").val();
  var username = $("#username").val();
  var email = $("#email").val();
  var phone = $("#phone").val();
  var nic = $("#nic").val();
  var password = $("#password").val();
  var rePassword = $("#repassword").val();

  if (firstname == "") {
    error_popup("Please Enter First Name");
    return false;
  } else if (lastname == "") {
    error_popup("Please Enter Last Name");
    return false;
  } else if (username == "") {
    error_popup("Please Enter User Name");
    return false;
  } else if (email == "") {
    error_popup("Please Enter Email");
    return false;
  } else if (!ValidateEmail(email)) {
    error_popup("You have entered an invalid email address!");
    return false;
  } else if (phone == "") {
    error_popup("Please Enter Phone Number");
    return false;
  } else if (nic == "") {
    error_popup("Please Enter NIC Number");
    return false;
  } else if (password == "") {
    error_popup("Please Enter Password");
    return false;
  } else if (!CheckPassword(password)) {
    error_popup("Please enter valid password matches the requirement");
    return false;
  } else if (rePassword == "") {
    error_popup("Please Enter Confirm Password");
    return false;
  } else if (password != rePassword) {
    error_popup("The confirm password does not match");
    return false;
  }
}

function showPassword() {
  var inputField = document.getElementById("password");
  if (inputField.type === "password") {
    inputField.type = "text";
  } else {
    inputField.type = "password";
  }
}

function ValidateEmail(email) {
  var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
  console.log(email);
  console.log(email.match(mailFormat));
  if (email.match(mailFormat)) {
    return true;
  } else {
    return false;
  }
}

function CheckPassword(password) {
  var passwordFormat =
    /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/g;
  console.log(password.match(passwordFormat));

  if (password.match(passwordFormat)) {
    return true;
  } else {
    return false;
  }
}
