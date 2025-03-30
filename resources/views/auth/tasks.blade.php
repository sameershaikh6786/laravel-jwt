<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h3>Task Lists</h3>
            </div>
            <div class="col-xxl-12 col-lg-12">
                <button type="button" id="modalopenbutton" data-bs-toggle="modal" style="float:right" data-bs-target="#newContactModal" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2">Add Task</button>
            </div>
            <div class="col-12">
                <table id="datatable" class="table" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Priority</td>
                            <td>Due Date</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newContactModalLabel">Add Tasks</h5>
                    <button type="button" class="btn-close" id="modalclosebutton" data-bs-dismiss="modal" aria-label="Close"> X </button>
                </div>
                    <div class="modal-body">
                        <form autocomplete="off" method ="post" class="needs-validation createContact-form" id="post_data" novalidate>
                            <div class="">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" id="userid-input">
                                    <div class="mb-3">
                                        <label for="username-input" class="form-label">Title</label>
                                        <input type="text" id="title" name="title" class="form-control only_letter" placeholder="Enter Title" required />
                                        <div class="invalid-feedback">Please enter title.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="textarea" id="description" name="description" class="form-control" placeholder="Enter Description"  required/>
                                        <div class="invalid-feedback">Please enter description.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" id="priority" class="form-control" required>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                        <div class="invalid-feedback">Please enter priority.</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="due_date" class="form-label">Due date</label>
                                        <input type="date" id="due_date" name="due_date" class="form-control only_letter" placeholder="Enter Due Date" required />
                                        <div class="invalid-feedback">Please enter due date</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                        <div class="invalid-feedback">Please enter status.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="button" id="addContact-btn" class="btn btn-success post_data_all" data-url="{{Request::root() }}/api/tasks" data-frmid="#post_data" data-modalname="#newContactModal" data-errormsg="#postCompalintErrormsg" data-response="refresh" >Save</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end modal body -->
            </div>
            <!-- end modal-content -->
        </div>
        <!-- end modal-dialog -->   
    </div>
    <div class="modal fade" id="newContactModal1" tabindex="-1" aria-labelledby="newContactModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newContactModal1Label">Add Tasks</h5>
                    <button type="button" class="btn-close" id="modalclosebutton" data-bs-dismiss="modal" aria-label="Close"> X </button>
                </div>
                    <div class="modal-body">
                        <form autocomplete="off" method ="post" class="needs-validation createContact-form" id="patch_data" novalidate>
                            <div class="">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="id" class="form-control" id="edit_id">
                                    <div class="mb-3">
                                        <label for="edit_title" class="form-label">Title</label>
                                        <input type="text" id="edit_title" name="title" class="form-control only_letter" placeholder="Enter Title" required />
                                        <div class="invalid-feedback">Please enter title.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_description" class="form-label">Description</label>
                                        <input type="textarea" id="edit_description" name="description" class="form-control" placeholder="Enter Description"  required/>
                                        <div class="invalid-feedback">Please enter description.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_priority" class="form-label">Priority</label>
                                        <select name="priority" id="edit_priority" class="form-control" required>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                        <div class="invalid-feedback">Please enter priority.</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="edit_due_date" class="form-label">Due date</label>
                                        <input type="date" id="edit_due_date" name="due_date" class="form-control only_letter" placeholder="Enter Due Date" required />
                                        <div class="invalid-feedback">Please enter due date</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_status" class="form-label">Status</label>
                                        <select name="status" id="edit_status" class="form-control" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                        <div class="invalid-feedback">Please enter status.</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="button" id="addContact-btn" class="btn btn-success patch_data_all" data-url="{{Request::root() }}/api/tasks" data-frmid="#patch_data" data-modalname="#newContactModal1" data-errormsg="#postCompalintErrormsg" data-response="refresh" >Update</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end modal body -->
            </div>
            <!-- end modal-content -->
        </div>
        <!-- end modal-dialog -->   
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    token = localStorage.getItem('token');
    $.ajaxSetup({
        headers: {
            'Authorization': token
        }
    });
    $(document).ready(function() {
        let DomainName = window.location.origin;
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: `${DomainName}/api/tasks`,
                type: "GET",
                data: function (data) {
                    data.search = $('input[type="search"]').val();
                }
            },
            order: ['1', 'DESC'],
            pageLength: 10,
            searching: true,
            aoColumns: [
                {
                    data: 'title',
                },
                {
                    data: 'description',
                },
                {
                    data: 'priority',
                },
                {
                    data: 'due_date',
                },
                {
                    data: 'status',
                },
                {
                    data: null,
                    width:240,
                    'bSortable': false,
                    render: function (data, type, full) {
                        return '<ul class="list-inline font-size-20 mb-0">\
                        <li class="list-inline-item">\
                        <div class="d-flex flex-wrap gap-2">\
                        <a href="#removeItemModal" data-bs-toggle="modal" class="btn btn-soft-success waves-effect waves-light editbtn" data-url="'+DomainName+'/api/tasks" data-remove-id="'+ full.id + '">Edit</a>\
                        <a href="javascript: void(0);" data-bs-toggle="modal" class="btn btn-soft-danger waves-effect waves-light confirmAction"  data-target="#modal-confirm" data-action-desc="Are you sure want to delete?" data-id="'+ full.id + '" data-type="delete" data-value="1" data-url="'+DomainName+'/api/tasks" data-remove-id="'+ full.id + '">Delete</a>\
                        </div>\
                        </li>\
                    </ul>';
                    }
                }
            ]
        });
    });
    $(document).on('click','#modalopenbutton', function(){
        $('#newContactModal').modal('show');
    });
    $(document).on('click','#modalclosebutton', function(){
        $('#newContactModal').modal('hide');
    });
    $(document).on('click', '.confirmAction', function () {
    let DomainName = window.location.origin;
    var id = $(this).attr('data-id');
    var value = $(this).attr('data-value');
    var message = $(this).attr('data-action-desc');
    var type = $(this).attr('data-type');
    var completeUrl = DomainName+'/api/tasks/'+id;
        Swal.fire({
            title: message,
            // text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success mt-2',
                cancelButton: 'btn btn-danger ms-2 mt-2',
            },
        buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: completeUrl,
                    type: 'DELETE',
                    success: function(res){
                        console.log(res);
                        if (res.status == 'success') {
                            Swal.fire({
                                title: res.message,
                                icon: "success",
                                showCancelButton: true,
                                cancelButtonText: "Ok",
                                showConfirmButton: false,
                                // cancelButtonColor: "#f46a6a",
                                timer: 3000,
                            })
                            $('#datatable').DataTable().ajax.reload();
                        }else {
                            $.each(res, function(key, value) {
                                $('#error').append(`<li>${value}</li>`)
                            });
                        }
                    }
                })
            
            } 
    });
});
    $(document).on("click", '.post_data_all', function () {
        var button = $(this).data('button');
        var aurl = $(this).data('url');
        var frm = $(this).data('frmid');
        var modalId = $(this).data('modalname');
        var $form = $(frm)[0];
        var formData = new FormData($form);
        if (button) {
            formData.append('button', button);
        }
        //console.log(formData);exit();
        $.ajax({
            type: "POST",
            url: aurl,
            data: formData,
            cache: false,
            // async: true,
            dataType: "json",
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            beforeSend: function () {
                $('.post_data_all').attr("disabled", true);
            },
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    $(frm)[0].reset();
                    $('.post_data_all').attr("disabled", false);
                    $('#datatable').DataTable().ajax.reload();
                    Swal.fire({
                        title: "Successfully!",
                        text: response.message,
                        icon: response.status,
                        showCancelButton: true,
                        cancelButtonText: "Ok",
                        showConfirmButton: false,
                        // cancelButtonColor: "#f46a6a",
                        timer: 3000,
                    })
                        $("#btn").click();
                        $(modalId).modal("hide");

                } else {
                    $('.post_data_all').attr("disabled", false);
                    printErrorMsg(response.errors);
                
                }
            },
            error: function (response) {
                $('.post_data_all').attr("disabled", false);
                var errors = $.parseJSON(response.responseText);
                Swal.fire({
                    title: "Error!",
                    html: "Something went wrong. Please try again!!!",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Ok",
                    showConfirmButton: false,
                    cancelButtonColor: "#f46a6a",
                    timer: 5000,
                })
                // $('.post_data_all').attr("disabled", false);
                // var errors = $.parseJSON(response.responseText);
                // resetModalFormErrors();
                // associate_errors(errors, $form);
            }
        });

    });

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    $(document).on('click','#modalopenbutton1', function(){
        $('#newContactModal1').modal('show');
    });
    $(document).on('click','#modalclosebutton1', function(){
        $('#newContactModal1').modal('hide');
    });
    $(document).on('click', '.editbtn', function () {
            var id = $(this).attr('data-remove-id');
            var url = $(this).attr('data-url');
            var full_url= url + "/" + id; 
            $.get(full_url, function (data, status) {
                console.log(data);
                var obj = data;
                if (obj.status == 'success') {
                    $("#edit_id").val(obj.task.id);
                    $("#edit_title").val(obj.task.title);
                    $("#edit_description").val(obj.task.description);
                    $("#edit_priority").val(obj.task.priority);
                    $("#edit_due_date").val(obj.task.due_date);
                    $("#edit_status").val(obj.task.status);
                    $('#newContactModal1').modal('show');
                } else {
                    Swal.fire({
                        title: "Error!",
                        html: "Something went wrong. Please try again!!!",
                        icon: "warning",
                        showCancelButton: true,
                        cancelButtonText: "Ok",
                        showConfirmButton: false,
                        cancelButtonColor: "#f46a6a",
                        timer: 5000,
                    })
                }
                
            });
    });
    $(document).on("click", '.patch_data_all', function () {
        var button = $(this).data('button');
        var aurl = $(this).data('url');
        var frm = $(this).data('frmid');
        var modalId = $(this).data('modalname');
        var $form = $(frm)[0];
        var formData = new FormData($form);
        var id = formData.get('id');
        if (button) {
            formData.append('button', button);
        }
        var full_url =aurl+'/'+id;
        console.log(full_url);
        $.ajax({
            type: "POST",
            url: full_url,
            data: formData,
            cache: false,
            // async: true,
            dataType: "json",
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            beforeSend: function () {
                $('.patch_data_all').attr("disabled", true);
            },
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    $(frm)[0].reset();
                    $('.patch_data_all').attr("disabled", false);
                    $('#datatable').DataTable().ajax.reload();
                    Swal.fire({
                        title: "Successfully!",
                        text: response.message,
                        icon: response.status,
                        showCancelButton: true,
                        cancelButtonText: "Ok",
                        showConfirmButton: false,
                        // cancelButtonColor: "#f46a6a",
                        timer: 3000,
                    })
                        $("#btn").click();
                        $(modalId).modal("hide");

                } else {
                    $('.patch_data_all').attr("disabled", false);
                    printErrorMsg(response.errors);
                
                }
            },
            error: function (response) {
                $('.patch_data_all').attr("disabled", false);
                var errors = $.parseJSON(response.responseText);
                Swal.fire({
                    title: "Error!",
                    html: "Something went wrong. Please try again!!!",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Ok",
                    showConfirmButton: false,
                    cancelButtonColor: "#f46a6a",
                    timer: 5000,
                })
                // $('.post_data_all').attr("disabled", false);
                // var errors = $.parseJSON(response.responseText);
                // resetModalFormErrors();
                // associate_errors(errors, $form);
            }
        });

    });
</script>
</body>
</html>


