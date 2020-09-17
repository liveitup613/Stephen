var ComponentsEditors = function () {
    
    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    var handleSummernote = function () {
        $('#sumnoteContent').summernote({height: 300});
        //API:
        //var sHTML = $('#summernote_1').code(); // get code
        //$('#summernote_1').destroy(); // destroy
    }

    return {
        //main function to initiate the module
        init: function () {
            handleWysihtml5();
            handleSummernote();
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsEditors.init(); 
});

$('.portfolio-camera').click(function() {    
    $('#filePortfolio').click();
});

$('#filePortfolio').change(function () {
    readURL(this, $('#imgPortfolio'));
});

function readURL(input, avatar) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(avatar)
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}

$('#btnUpdate').click(function() {
    if(!$('#blogForm').valid())
        return;

    var editedId = $('#ID').val();

    $('#inputContent').val($('#sumnoteContent').code());

    $.ajax({
		url: base_url + "api/blog/edit",
		method: "POST",
		data: new FormData(document.getElementById('blogForm')),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
		success: function (res) {
			if (res.success == true) {
                document.location.href = base_url + 'admin/blog';
            }
            else {
                showErrorToastr(editedId == 0 ? 'Add New Blog' : 'Edit Blog');
            }
        },
        error: function (err) {
            showErrorToastr(editedId == 0 ? 'Add New Blog' : 'Edit Blog');
        }
	});
})