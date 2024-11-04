<style>
    .alert button{
        background: white;
        border: none;
        padding: 0px 8px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
</style>

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" id="custom-alert">
    <button type="button" class="close" onclick="closeAlert()">×</button>
    <h4><i class="icon fa fa-ban"></i> Error!</h4>   {{ Session::get('error') }}

</div>
@endif



@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" id="custom-alert">
    <button type="button" class="close" onclick="closeAlert()">×</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>  {{ Session::get('success') }}
</div>
@endif

<script>
    function closeAlert() {
        var customAlert = document.getElementById('custom-alert');
        customAlert.style.display = 'none';
    }
</script>
