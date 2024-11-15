function fnLoadData(){
    $('form').attr('id','feedbackForm');
    $('button').addClass('d-none');
    $('#btnSubmit').removeClass('d-none');
    var url = 'req/view';

    $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {
            $('#viewSurvey').html(data);
        }
    });
}

fnLoadData();

function edit(param) {
    $('form').attr('id','ufeedbackForm');
    $('button').addClass('d-none');
    $('#btnUpdate').removeClass('d-none');
    $('#btnCancel').removeClass('d-none');
    var url = 'req/edit'

    $.ajax({
        type: "POST",
        url: url,
        data: {'param':param}, // serializes the form's elements.
        success: function(data)
        {
            var result = JSON.parse(data);
            var objService = result.services;
            var servicesArray = objService.split(", ");

            $.each(servicesArray, function(index, value) {
                $("input[type=checkbox][name='services_used[]'][value='" + value + "']").prop("checked", true);
            });

            $('#id').val(result.id);
            $('#name').val(result.name);
            $('#email').val(result.email);
            $('#age').val(result.age);
            $('#feedback_type').val(result.feedback_type);
            $('#comments').val(result.comments);
        }
    });
}

function fnDelete(param) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm',
    }).then((result) => {
        if (result.value) {
            var url = 'req/delete'

            $.ajax({
                type: "POST",
                url: url,
                data: {'param':param}, // serializes the form's elements.
                success: function() {
                    toastr.success('Feedback deleted successfully!', 'Success', { positionClass: 'toast-bottom-right' });
                    fnLoadData();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText || "An error occurred while submitting your feedback.";
                    toastr.error(errorMessage, 'Error', { positionClass: 'toast-bottom-right' });
                }
            });
        }
    })
}

function fnCancel(){
    $("#ufeedbackForm")[0].reset();
    fnLoadData();
}

$(document).on("submit", "#feedbackForm", function(e) {
    e.preventDefault();

    var url = 'req/insert';
    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function() {
            toastr.success('Feedback submitted successfully!', 'Success', { positionClass: 'toast-bottom-right' });
            $("#feedbackForm")[0].reset();
            fnLoadData();
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText || "An error occurred while submitting your feedback.";
            toastr.error(errorMessage, 'Error', { positionClass: 'toast-bottom-right' });
        }
    });
});

$(document).on("submit", "#ufeedbackForm", function(e) {
    e.preventDefault();

    var url = 'req/update';
    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function() {
            toastr.success('Feedback updated successfully!', 'Success', { positionClass: 'toast-bottom-right' });
            $("#ufeedbackForm")[0].reset();
            fnLoadData();
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText || "An error occurred while submitting your feedback.";
            toastr.error(errorMessage, 'Error', { positionClass: 'toast-bottom-right' });
        }
    });
});