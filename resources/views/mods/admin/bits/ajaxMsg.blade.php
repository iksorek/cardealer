<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{__('messages.messages')}}</h4>
            </div>
            <div class="modal-body" id="modal-content"> One fine body...</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default inverted"
                        data-dismiss="modal">{{__('messages.close')}}</button>

            </div>
        </div>
    </div>
</div>
<script language="JavaScript">
    function delMsg(msg) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                document.querySelector('#msg-' + msg).innerHTML = '{{__('messages.message_deleted')}}';
                document.querySelector('#delBtn' + msg).disabled = true;

            }
        };
        xhttp.open("GET", "{{asset('admin/delMessage')}}" + '/' + msg, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
    }

    function readMsg(msg) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                document.querySelector('#modal-content').innerHTML = this.responseText;
                document.querySelector('#newLabel' + msg).innerHTML = '{{__('messages.old')}}';
                document.querySelector('#newLabel' + msg).classList.remove('label-warning');
                document.querySelector('#newLabel' + msg).classList.add('label-info');


            }
        };
        xhttp.open("GET", "{{asset('admin/readMessage')}}" + '/' + msg, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
    }

</script>
