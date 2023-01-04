function validateResetForm() {
  var email = $("#email").val();
  var password = $("#newPassword").val();

  if (email == "") {
    error_popup("Please Enter Email");
    return false;
  } else if (!ValidateEmail(email)) {
    error_popup("You have entered an invalid email address!");
    return false;
  } else if (password == "") {
    error_popup("Please Enter Password");
    return false;
  } else if (!CheckPassword(password)) {
    error_popup("Please enter valid password matches the requirement");
    return false;
  }
}

function CheckPassword(password) {
  var passwordFormat =
    /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/g;

  if (password.match(passwordFormat)) {
    return true;
  } else {
    return false;
  }
}

function ValidateEmail(email) {
  var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
  if (email.match(mailFormat)) {
    return true;
  } else {
    return false;
  }
}
