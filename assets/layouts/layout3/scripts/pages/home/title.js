$('#btnUpdate').click(function() {
    $.ajax({
        url : base_url + 'api/home/updateTitle',
        type : 'post',
        data : {
            MainHeading : $('#MainHeading').val(),
            Service : $('#Service').val(),
            AfterHeadingTitle: $('#AfterHeadingTitle').val(),
            AfterHeadingContent: $('#AfterHeadingContent').val()
        },
        success: function(res) {
            var data = JSON.parse(res);

            if (data.success == true)
                showSuccessToastr('Update Home Title');
            else 
                showErrorToastr('Update Home Title');
        },
        error : function(err) {
            showErrorToastr('Update Home Title');
        }
    })
});