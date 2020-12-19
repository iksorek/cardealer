function delPhoto(photo) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert('usunalem!');
        }
    };
    xhttp.open("GET", "admin/deletePhoto/" + photo, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}


