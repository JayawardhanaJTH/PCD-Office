function randomPassword(length) {
  // alert("hi");

  var chars =
    "abch128kfjk%#@pkjkn189960!-_nojwfpovm872563209^@#@*&)_*YIF<:MF*%^#$@^(A<AAAAJFM vlaojfrk";
  var pass = "";
  for (var x = 0; x < length; x++) {
    var i = Math.floor(Math.random() * chars.length);
    pass += chars.charAt(i);
  }
  if (document.getElementById("password")) {
    document.getElementById("password").value = pass;
    console.log("element",pass)

  } else {
    document.cookie = "reset_pass = " + pass;
    console.log("cookie",pass)
  }
  // alert(pass);
}
