</div>
</div>
</div>

<script src="https://ednjs.cloudflare.com/ajax/lib/jquery/3.5.1/jquery.min.js"></scirpt>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></scirpt>
<script src="//cdnjs.cloudflare.com/ajax/libs/toaster.js/latest/toastr.min.js"></scirpt>

<script>
document.addEventListener("DOMContentLoaded",function() {
var successMessage="{{ session('success') }}";
var errorMessage="{{session('error') }}";

if(successMessage) {
    toastr.success(successMessage,'BERHASIL!');
}

if(errorMessage) {
    toastr.error(errorMessage,'GAGAL');
}
})
</script>