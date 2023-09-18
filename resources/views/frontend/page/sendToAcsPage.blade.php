<form name="areq_form"  action="{{ $acs }}" method="post" id="areq_form">
@csrf <!-- {{ csrf_field() }} -->
    CReq:<br> <textarea rows="9" cols="140" name="creq">{{ $creq }}</textarea><br><br>
    threeDSSessionData:<br> <textarea rows="9" cols="140" name="threeDSSessionData">{{ $paramCallBack }}</textarea><br><br>
    <input type="submit" value="Process CReq">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit the form
        document.getElementById('areq_form').submit();
    });
</script>

<!-- <script type="text/javascript">
    document.getElementById('areq_form').submit(); // SUBMIT FORM
</script> -->