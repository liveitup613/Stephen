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

function editService(ID, Enable) {
    editedServiceID = ID;

    $('#Enable').val(Enable);
    $('#editModal').modal('show');
}

$('#btnUpdateService').click(function() {
    $.ajax({
        url: base_url + 'api/whatwedo/edit',
        type: 'post',
        data: {
            ID: editedServiceID,
            Enable: $('#Enable').val()
        },
        success: function(){
            document.location.reload();
        },
        error: function(err) {
            showErrorToastr('Update Service');
        }
    })
})