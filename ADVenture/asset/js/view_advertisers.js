function search_advs() {
  let search_word = document.querySelector(".search_advs_i").value;
  display_advs_ajax(event, null, search_word, null);
}

function display_advs_ajax(event, status, search_word, order) {
  event.preventDefault();
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/view_advertisers_server.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  if (status === null && order == null) {
    xhttp.send("search_word=" + search_word);
  } else if (search_word === null && order === null) {
    xhttp.send("status=" + status);
  } else {
    xhttp.send("order=" + order);
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
  display_advs_ajax(event, "All", null, null);
};

let userId = null;
