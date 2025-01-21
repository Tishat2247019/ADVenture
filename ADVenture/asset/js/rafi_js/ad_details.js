function save_ad(user_id,ad_id){
    let xhttp = new XMLHttpRequest();
    xhttp.open('post', 'save_ad.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('user_id='+user_id + '&ad_id='+ad_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            //alert(this.responseText);
            // document.getElementById('head').innerHTML = this.responseText;
            alert(this.responseText);
        }
    }
}