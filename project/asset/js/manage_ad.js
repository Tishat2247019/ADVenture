function ad_based_catecogry(event, ad_category_value, search_word) {
  event.preventDefault();
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/manage_ad_server.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  if (ad_category_value == null) {
    xhttp.send("id=" + idd + "&search_word=" + search_word);
  } else {
    xhttp.send("id=" + idd + "&ad_category=" + ad_category_value);
  }
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let tableBody = document.querySelector(".ad_table tbody");

      if (!tableBody) {
        tableBody = document.createElement("tbody");
        document.querySelector(".ad_table").appendChild(tableBody);
      }

      if (this.responseText === "no add found") {
        let messageRow = document.createElement("tr");
        let messageCell = document.createElement("td");
        messageCell.setAttribute("colspan", "8"); 

        messageCell.innerHTML = "No Ads Found"; 

        messageCell.style.cssText =
          "text-align :center; height : 300px; font-size:100px; font-weight:bold; color:red"; 
        messageRow.appendChild(messageCell);
        tableBody.innerHTML = ""; 
        tableBody.appendChild(messageRow);
      } else {
        tableBody.innerHTML = this.responseText;
      }
    }
  };
}

window.onload = function () {
  ad_based_catecogry(event, "All", null);
};

let adId = null;

function confirmDelete(adId1) {
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");

  message.innerText = `Are you sure you want to delete Ad ${adId1}?`;
  popup.style.display = "block";

  document.getElementById("confirmYes").style.display = "inline-block";
  document.getElementById("confirmNo").style.display = "inline-block";
  document.getElementById("confirmOk").style.display = "none";

  adId = adId1;
}

function confirmDelete1(event) {
  event.preventDefault();
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../model/delete_ad.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("idt=" + adId);

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

document.getElementById("confirmNo").addEventListener("click", function () {
  let popup = document.getElementById("confirmPopup");
  popup.style.display = "none"; 
});

document.getElementById("confirmOk").addEventListener("click", function () {
  let ok = document.getElementById("confirmPopup");
  ok.style.display = "none"; 
});
