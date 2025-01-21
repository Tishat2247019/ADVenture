let ad_id = null;
let is_validate = true;
function confirmedit(event, ad_id1) {
  event.preventDefault();
  if(is_validate){
  const popup = document.getElementById("confirmPopup");
  const message = document.getElementById("popupMessage");

  message.innerText = `Are you sure you want to edit information of  ad ${ad_id1}?`;
  popup.style.display = "block";

  document.getElementById("confirmYes").style.display = "inline-block";
  document.getElementById("confirmNo").style.display = "inline-block";
  document.getElementById("confirmOk").style.display = "none";
  ad_id = ad_id1;
  }
  else{
    document.getElementById("all_error").style.display = "inline";
  }

}

function confirmedit1(event) {
  event.preventDefault();
  // console.log(document.getElementById("new_category").value);
  const message = document.getElementById("popupMessage");

  let new_ad_title = document.getElementById("new_ad_title_id").value;
  let new_ad_description = document.getElementById("new_ad_description_id").value;
  let new_phone = document.getElementById("new_phone_id").value;
  let new_email = document.getElementById("new_email_id").value;
  let new_price = document.getElementById("new_price_id").value;
  let new_category = document.getElementById("new_category_id").value;

  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../../controller/edit_ad_server.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send(
    "idt=" + ad_id + "&new_ad_title=" + new_ad_title + "&new_ad_description=" +new_ad_description +
      "&new_phone=" + new_phone + "&new_email=" + new_email + "&new_price=" + new_price + "&new_category=" +
      new_category
  );

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      message.innerHTML = this.responseText;
      document.getElementById("confirmYes").style.display = "none";
      document.getElementById("confirmNo").style.display = "none";
      document.getElementById("confirmOk").style.display = "block";
      // alert(this.responseText);
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




function check_email() {
  let email_input_field = document.getElementById("new_email_id");
  let email = email_input_field.value;
  if (email.trim() !== "") {
    validate1 = email.indexOf(".com");
    validate2 = email.indexOf("@");
    if (
      validate1 == -1 ||
      validate2 == -1 ||
      validate1 < email.length - 4 ||
      email.length - validate2 < 6
    ) {
      document.getElementById("email_error").style.display = "inline";
      is_validate = false;
      // email_input_field.style.border = "1px solid red";
    } else {
      document.getElementById("email_error").style.display = "none";
      is_validate = true;
    }
  } else {
    document.getElementById("email_error").style.display = "none";
    is_validate = true;
  }
}
function isNumber(str) {
  return !isNaN(str);
}

function check_phone() {
  let phone_input_field = document.getElementById("new_phone_id");
  let phone = phone_input_field.value;
  if (phone.trim() !== "") {
    if (!isNumber(phone)) {
      document.getElementById("phone_error").style.display = "inline";
    is_validate = false;

    } else {
      document.getElementById("phone_error").style.display = "none";
    is_validate = true;

    }
  } else {
    document.getElementById("phone_error").style.display = "none";
    is_validate = true;

  }
}

function check_price() {
  let price_input_field = document.getElementById("new_price_id");
  let price = price_input_field.value;
  if (price.trim() !== "") {
    if (!isNumber(price)) {
      document.getElementById("price_error").style.display = "inline";
    is_validate = false;

    } else {
      document.getElementById("price_error").style.display = "none";
    is_validate = true;

    }
  } else {
    document.getElementById("price_error").style.display = "none";
    is_validate = true;

  }
}


function check_title() {
  let title_input_field = document.getElementById("new_ad_title_id");
  let title = title_input_field.value;
  if (title.trim() !== "") {
    if (title.length < 6) {
      document.getElementById("title_error").style.display = "inline";
      is_validate = false;

    } else {
      document.getElementById("title_error").style.display = "none";
    is_validate = true;

    }
  } else {
    document.getElementById("title_error").style.display = "none";
    is_validate = true;
  }
 
}