function display_reported_ads() {
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/reported_ads_server.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let reported_ads_div = document.querySelector(".ad_info_container");
      reported_ads_div.innerHTML = this.responseText;
    }
  };
}

window.onload = function () {
  display_reported_ads();
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
      const response = JSON.parse(xhttp.responseText);
      if (response.success === true) {
        message.innerText = `Ad ${adId} successfully deleted.`;
        document.getElementById("confirmYes").style.display = "none";
        document.getElementById("confirmNo").style.display = "none";
        document.getElementById("confirmOk").style.display = "block";
      } else {
        message.innerText = `Error: ${response.message}`;
      }
    }
  };
}

document.getElementById("confirmNo").addEventListener("click", function () {
  const popup = document.getElementById("confirmPopup");
  popup.style.display = "none"; 
});

document.getElementById("confirmOk").addEventListener("click", function () {
  const ok = document.getElementById("confirmPopup");
  ok.style.display = "none"; 
});
