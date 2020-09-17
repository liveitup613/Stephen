var editedID = 0;
$('#btnUpdate').click(function() {
    $.ajax({
        url : base_url + 'api/about-us/update',
        type : 'post',
        data : {
            Title: $('#Title').val(),
            Content: replaceNR2Br($('#Content').val())
        },
        success: function(res) {
            var data = JSON.parse(res);

            if (data.success == true)
                showSuccessToastr('Update About Us');
            else 
                showErrorToastr('Update About Us');
        },
        error : function(err) {
            showErrorToastr('Update About Us');
        }
    })
});

$('#btnAddNewCoreValue').click(function() {
    $('#AddNewModal').modal('show');
});

$('#btnAddNew').click(function() {
    if (!$('#addNewForm').valid())
        return;

    $.ajax({
        url: base_url + 'api/about-us/coreValue/add',
        type: 'post',
        data: {
            Title : $('#CoreValueTitle').val()
        },
        success: function() {
            document.location.reload();
        },
        error: function(err) {
            showErrorToastr('Add New Core Value');
        }        
    })
});

function deleteCoreValue(ID) {

    editedID = ID;
    $('#deleteModal').modal('show');
}

$('#btnDeleteModalYes').click(function() {
    $.ajax({
        url : base_url + 'api/about-us/coreValue/delete',
        type: 'post',
        data: {
            ID : editedID
        },
        success: function() {
            document.location.reload();
        },
        error: function(err) {
            showErrorToastr('Delete Core Value');
        }
    })
})