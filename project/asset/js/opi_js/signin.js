function username1() {
    let username = document.getElementById("name").value;
  
    if (username.length < 6) {
      document.getElementById("name_val").style.display = "inline";
    } else {
      document.getElementById("name_val").style.display = "none ";
    }
  }
  
  function password1() {
    let password = document.getElementById("password").value;
  
    if (password.length < 6) {
      document.getElementById("pass_val").style.display = "inline";
    } else {
      document.getElementById("pass_val").style.display = "none ";
    }
  }