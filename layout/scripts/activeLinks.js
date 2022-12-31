function activeLink(name) {
  localStorage.setItem("name", name);
}

window.onload = function () {
  var tab;
  var pageName = getCookie("pageName");
  var name2 = localStorage.getItem("name");

  if (pageName == "" || pageName == null) {
    tab = document.getElementById(name2);
  } else {
    tab = document.getElementById(pageName);
  }

  if ((tab != null || tab != undefined) && name2 != "reset") {
    tab.classList.add("active");
  }
};

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
