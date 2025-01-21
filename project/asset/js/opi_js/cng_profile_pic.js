function change_profile_pic(event) {
  event.preventdefault();
  //   let username = document.getElementById("username").value;
  let xhttp = new XMLHttpRequest();
  xhttp.open(
    "post",
    "../../../controller/opi_controller/cng_profile_pic_check.php",
    true
  );
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("name=" + username);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      document.getElementById("head").innerHTML = this.responseText;
    }
  };
}
