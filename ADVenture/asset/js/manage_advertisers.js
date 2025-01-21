function search_advs() {
  let search_word = document.querySelector(".search_advs_i").value;
  display_advs_ajax(event, null, search_word);
}

function display_advs_ajax(event, status, search_word) {
  event.preventDefault();
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/manage_advertisers_server.php", true);
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
  display_advs_ajax(event, "All", null);
};

let advId = null;
function confirmDelete(advId1) {
  // Show confirmation dialog

  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");

  message.innerText = `Are you sure you want to delete user ${advId1}?`;
  popup.style.display = "block";

  document.getElementById("confirmYes").style.display = "inline-block";
  document.getElementById("confirmNo").style.display = "inline-block";
  document.getElementById("confirmOk").style.display = "none";

  advId = advId1;
}

function confirmDelete1(event) {
  event.preventDefault();
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../model/delete_user.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("idt=" + advId);

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      const response = JSON.parse(xhttp.responseText);
      if (response.success === true) {
        // alert("User deleted successfully");
        message.innerText = `User ${advId} successfully deleted.`;
        document.getElementById("confirmYes").style.display = "none";
        document.getElementById("confirmNo").style.display = "none";
        document.getElementById("confirmOk").style.display = "block";
      } else {
        message.innerText = `Error: ${response.message}`;
      }
    }
  };
}

function hide_popup(event) {
  event.preventDefault();
  const popup = document.getElementById("confirmPopup");
  popup.style.display = "none";
}
