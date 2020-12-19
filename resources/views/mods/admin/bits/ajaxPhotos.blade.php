<script language="JavaScript">
    function delPhoto(photo) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                document.querySelector('#photo-' + photo).innerHTML = '{{__('messages.photo_deleted')}}!';

            }
        };
        xhttp.open("GET", "{{asset('admin/deletePhoto')}}" + '/' + photo, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
</script>
