function search_user() {
  let search_word = document.querySelector(".search_user_i").value;
  display_user_ajax(event, null, search_word);
}

function display_user_ajax(event, status, search_word) {
  event.preventDefault();
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/manage_users_server.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  if (status === null) {
    xhttp.send("id=" + idd + "&search_word=" + search_word);
  } else {
    xhttp.send("id=" + idd + "&status=" + status);
  }

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let tableBody = document.querySelector(".user_table tbody");
      if (!tableBody) {
        tableBody = document.createElement("tbody");
        document.querySelector(".user_table").appendChild(tableBody);
      }
      tableBody.innerHTML = this.responseText;
    }
  };
}

window.onload = function () {
  display_user_ajax(event, "All", null);
};

let userId = null;

function confirmDelete(userId1) {
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");

  message.innerText = `Are you sure you want to delete user ${userId1}?`;
  popup.style.display = "block";

  document.getElementById("confirmYes").style.display = "inline-block";
  document.getElementById("confirmNo").style.display = "inline-block";
  document.getElementById("confirmOk").style.display = "none";

  userId = userId1;
}

function confirmDelete1(event) {
  event.preventDefault();
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../model/delete_user.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("idt=" + userId);

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let response = JSON.parse(this.responseText);
      if (response.success === true) {
        message.innerText = response.message;
        document.getElementById("confirmYes").style.display = "none";
        document.getElementById("confirmNo").style.display = "none";
        document.getElementById("confirmOk").style.display = "block";
      } else {
        message.innerText = response.message;
      }
    }
  };
}

function hide_popup(event) {
  event.preventDefault();
  const popup = document.getElementById("confirmPopup");
  popup.style.display = "none";
}
