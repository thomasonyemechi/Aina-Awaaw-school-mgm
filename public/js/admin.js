$(document).ready(function () {
    $('body').on('click', '#adminDeleteDepartment', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/manageDepartmentDelete/' + id
            }).done(function (res) {

                if(!res.data.success) {
                    $('#error').show().html(res.data.message).fadeOut(4500);
                } else {
                    $('#success').show().html(res.data.message).delay(1500)
                        .queue(function (next) {
                            location.reload();
                        });
                }
                //if(res.data.success == true) {
                //    $('#success').show().html(res.data.message).delay(1500)
                //        .queue(function (next) {
                //            location.reload();
                //        });
                //} else {
                //    $('#error').show().html(res.data.message).hide(4500);
                //}

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#adminDeleteRole', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/adminDeleteRole/' + id
            }).done(function (res) {

                if(!res.data.success) {
                    $('#error').show().html(res.data.message).fadeOut(4500);
                } else {
                    $('#success').show().html(res.data.message).delay(1500)
                        .queue(function (next) {
                            location.reload();
                        });
                }
                //if(res.data.success == true) {
                //    $('#success').show().html(res.data.message).delay(1500)
                //        .queue(function (next) {
                //            location.reload();
                //        });
                //} else {
                //    $('#error').show().html(res.data.message).hide(4500);
                //}

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#adminDeleteSickness', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/manageSicknessDelete/' + id
            }).done(function (res) {

                if(!res.data.success) {
                    $('#error').show().html(res.data.message).fadeOut(4500);
                } else {
                    $('#success').show().html(res.data.message);
                    location.reload();
                        //.delay(1000)
                        //.queue(function (next) {
                        //    location.reload();
                        //});
                }
                //if(res.data.success == true) {
                //    $('#success').show().html(res.data.message).delay(1500)
                //        .queue(function (next) {
                //            location.reload();
                //        });
                //} else {
                //    $('#error').show().html(res.data.message).hide(4500);
                //}

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#adminDeleteCat', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/deleteexpensecat/' + id
            }).done(function (res) {

                if(!res.data.success) {
                    $('#error').show().html(res.data.message).fadeOut(4500);
                } else {
                    $('#success').show().html(res.data.message).delay(1500)
                        .queue(function (next) {
                            location.reload();
                        });
                }

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#adminDeleteStockCat', function (e) {
        e.preventDefault();
        var id = $(this).data('id');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/deletestockcat/' + id
            }).done(function (res) {

                if(!res.data.success) {
                    $('#error').show().html(res.data.message).fadeOut(4500);
                } else {
                    $('#success').show().html(res.data.message).delay(1500)
                        .queue(function (next) {
                            location.reload();
                        });
                }

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('#staffLog').on('keyup', function (e) {
        e.preventDefault();
        var field = $(this).val();
        var table = `
            <table class="table table-striped table-responsive">
                <thead><tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                <tr><thead><tbody>
        `;

        $.ajax({
            url: '/staffsearch/' + field,
            method: 'GET'
        }).done(function (data) {
            if (data.value == 1) {
                $.each(data.data, function(data, value) {
                    table += `
                    <tr>
                    <td><a id="staffActivity" data-id=${value.sid}>${value.firstname}</a></td>
                    <td><a id="staffActivity" data-id=${value.sid}>${value.lastname}</a></td>
                    <td>${value.phone}</td>
                    <td>${value.email}</td>
                    <td>
                    <a class="btn btn-primary" id="staffActivity" data-id=${value.sid}>Check</a>
                    </td>
                    </tr>
                        `
//                        console.log(value.firstname);
                });
                table += `</tbody></table>`;
                $('#showStaffProfile').html(table)
            }
        }).fail(function (data) {
            if(field.trim() == '' || field.length < 1) {
                $('#showStaffProfile').html('');
            } else {
                $('#showStaffProfile').html(`<strong class='text-danger'>No Record found</strong>`);
            }

        });
    });

    $('body').on('click', '#staffActivity', function () {
        var sid =  $(this).data('id');
        //window.location.href = ''
        var hashsid = '123fade.'+'7rt543gtdtvcfy3tv.'+'12ew3gdt5.'+'123098.'+'5fq65er6qfhfq2rh2y8.' +
            'ihcki7qyhc265356vcvrvg178yb.' +
            'uiou89y78yui873ur72yjfu2aatgu.'+sid;
        $(location).attr('href','/showStaffActivity/'+hashsid);
    });

    $('body').on('click', '#deactivateStaff', function(e) {
        e.preventDefault();

        var staffId = $('#staffId').data('id');
        var staffBid = $('#staffBid').data('id');
        var token = $('#token').val();
        var activate = $('#activate').val();
        var compose = (activate == 1) ? 'Deactivate' : 'Re-Activate';
        if(confirm('Are You Sure you want to '+ compose +' Staff')){
            $.ajax({
                method: 'POST',
                url: '/deactivateStaff',
                data: {
                    _token: token,
                    staffId: staffId,
                    staffBid: staffBid
                }
            }).done(function(data) {


                if (data.value === 1) {
                    $('#showMessage').addClass('alert alert-success').show().html(data.message).fadeOut(3500);
                    $(this).removeClass().addClass('btn btn-danger submit-btn').text('De-Activate');
                    location.reload();
                } else if(data.value === 0) {
                    $('#showMessage').addClass('alert alert-danger').show().html(data.message).fadeOut(3500);
                    $('#deactivateStaff').removeClass().addClass('btn btn-warning submit-btn').text('Re-Activate');
                    location.reload();
                }
                console.log(data)

            });
        }

    });

    $('body').on('click', '#activateStaff', function (e) {
        e.preventDefault();
        var sid = $(this).data('id');

        if(confirm('Are You sure you want to Activate Staff')){
            $.ajax({
                method: 'GET',
                url: '/activateStaff/'+sid
            }).done(function (res) {
                $('#showMessage').show().html(res.message);
                setTimeout( function () {
                    location.reload();
                }, 3500);
                console.log(res);
            });

        }
    });

});