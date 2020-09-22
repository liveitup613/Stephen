var editedServiceID = 0;


$('#btnAddNew').click(function() {
    $('#Title').val('');
    $('#Content').val('');
    $('#Portfolio').val('');
    $('#AddNewModal').modal('show');
});

$('#btnAddNewService').click(function() {
    if (!$('#newServiceForm').valid()) {
        return;
    }

    $.ajax({
		url: base_url + "api/whatwedo/add",
		method: "POST",
		data: new FormData(document.getElementById('newServiceForm')),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
		success: function (res) {
			if (res.success == true) {
                showSuccessToastr('Add New Service');
				document.location.reload();
            }
            else {
                showErrorToastr('Add New Service');
            }
        },
        error: function (err) {
            showErrorToastr('Add New Service');
        }
	});
});

function deleteService(ID) {
    editedServiceID = ID;

    $('#deleteModal').modal('show');
}

$('#btnDeleteModalYes').click(function() {
    $.ajax({
        url : base_url + 'api/whatwedo/delete',
        method : 'post',
        data: {
            ID : editedServiceID
        },
        success: function() {
            showSuccessToastr('Delete Service');
            document.location.reload();
        },
        error: function(err) {
            showErrorToastr('Delete Service');
        }
    })
})

function editService(ID) {    
    $('#ID_Edit').val(ID);

    $.ajax({
        url: base_url + 'api/whatwedo/get',
        type: 'post', 
        data: {
            ID : ID
        },
        success: function(res) {
            var data = JSON.parse(res);
            data = data.data;
            if (data.success == false) {
                showErrorToastr('Get Detail');
                return;
            }

            $('#Title_Edit').val(data.Title);
            $('#Content_Edit').val(data.Content);
            $('#Enable_Edit').val(data.Enable);
            $('#imgPortfolio').attr('src', base_url + 'assets/images/whatwedo/' + data.Portfolio);
            $('#editModal').modal('show');

        }
    });    
}

$('.portfolio-camera').click(function() {    
    $('#Portfolio_Edit').click();
});

$('#Portfolio_Edit').change(function () {
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

$('#btnUpdateService').click(function() {
    $.ajax({
        url: base_url + 'api/whatwedo/edit',
        method: "POST",
		data: new FormData(document.getElementById('updateServiceForm')),
		contentType: false,
		cache: false,
		processData: false,
		dataType: "json",
        success: function(res){
            if (res.success == true)
                document.location.reload();
            else   
                showErrorToastr('Update Service');
        },
        error: function(err) {
            showErrorToastr('Update Service');
        }
    })
})