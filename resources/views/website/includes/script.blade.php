<!-- Modernizer JS -->
<script src="{{asset('/')}}website/assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{asset('/')}}website/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('/')}}website/assets/js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="{{asset('/')}}website/assets/js/plugins.js"></script>
<!-- ycp JS -->
<script src="{{asset('/')}}website/assets/js/ycp.js"></script>
<!-- Main JS -->
<script src="{{asset('/')}}website/assets/js/main.js"></script>

<script src="{{asset('/')}}website/assets/summernote/summernote-bs4.min.js"></script>
<!-- init js -->
<script src="{{asset('/')}}website/assets/js/form-editor.init.js"></script>

<script>
    function setSubCategory(id) {
        // alert(categoryId)
        $.ajax({   // "$" means  jQuery object
            type: "GET",
            url: "{{ route('get-sub-category-by-category') }}",
            // data: {cateId: id},
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                // alert(response);
                //2nd
                // console.log(response);
                //3rd
                var option = '';
                option += ' <option value="" disabled selected> -- Select Sub Category --</option>';
                $.each(response, function (key,value) {
                    option += '<option value="'+value.id+'">' + value.name + '</option>';
                });

                // console.log(option);
                $('#subCategoryId').empty();
                $('#subCategoryId').append(option);

            }
        })
    }

</script>

<script>
    var navbar= document.getElementById('navbar');
    var menu= document.getElementById('menu');
    var logo= document.getElementById('logo');
    var nav= document.getElementById('nav');
    window.onscroll = function () {
        if (window.pageYOffset > menu.offsetTop){
            navbar.classList.add('sticky');
            logo.classList.remove('d-none');
            nav.classList.add('ms-5')

        }else{
            navbar.classList.remove('sticky');
            logo.classList.add('d-none');
            logo.classList.add('me-5');
            nav.classList.remove('ms-5');
        }
    }
</script>

