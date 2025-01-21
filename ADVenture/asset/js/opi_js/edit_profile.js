function edit_profile(event, id) {
  event.preventDefault();

  let username = document.getElementById("name1").value;
  let email = document.getElementById("email1").value;
  let xhttp = new XMLHttpRequest();
  xhttp.open(
    "post",
    "../../../controller/opi_controller/edi_profile_check.php",
    true
  );
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("username=" + username + "&email=" + email + "&id=" + id);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("success_h").style = "display:inline-block";
      document.getElementById("success_h").innerHTML = this.responseText;
    }
  };
}
