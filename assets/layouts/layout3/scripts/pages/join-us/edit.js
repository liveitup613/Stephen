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


$('#btnUpdate').click(function() {
    if(!$('#jobForm').valid())
        return;

    var editedId = $('#ID').val();

    $('#inputContent').val($('#sumnoteContent').code());

    $.ajax({
		url: base_url + "api/job/edit",
		method: "POST",
		data: new FormData(document.getElementById('jobForm')),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
		success: function (res) {
			if (res.success == true) {
                document.location.href = base_url + 'admin/join-us';
            }
            else {
                showErrorToastr(editedId == 0 ? 'Add New Job' : 'Edit Job');
            }
        },
        error: function (err) {
            showErrorToastr(editedId == 0 ? 'Add New Job' : 'Edit Job');
        }
	});
})