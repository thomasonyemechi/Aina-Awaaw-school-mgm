$(document).ready(function () {

    $('body').on('click', '#profileEducationDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var sid = $(this).data('sid');
        var token = $(this).data('token');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'POST',
                url: '/manageEducationDelete/' + sid  ,
                data: {
                    sn: id,
                    _token: token
                }
            }).done(function (res) {
                $('#error').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });

            }).fail(function (res) {
                console.log(res.data);
            });
        } else {

        }

        //console.log($id);
    });

    $('body').on('click', '#profileExperienceDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var sid = $(this).data('sid');
        var token = $(this).data('token');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'POST',
                url: '/manageExperienceDelete/' + sid  ,
                data: {
                    sn: id,
                    _token: token
                }
            }).done(function (res) {
                $('#error2').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });

            }).fail(function (res) {
                console.log(res.data);
            });
        } else {

        }
    });

    $('body').on('click', '#patientEducationDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var pid = $(this).data('pid');
        var token = $(this).data('token');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'POST',
                url: '/managePatientEducationDelete/' + pid  ,
                data: {
                    sn: id,
                    _token: token
                }
            }).done(function (res) {
                $('#error').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });

            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#patientExperienceDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var pid = $(this).data('pid');
        var token = $(this).data('token');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'POST',
                url: '/managePatientExperienceDelete/' + pid  ,
                data: {
                    sn: id,
                    _token: token
                }
            }).done(function (res) {
                $('#error2').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });
            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#patientReportDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var pid = $(this).data('pid');
        var token = $(this).data('token');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'POST',
                url: '/managePatientReportDelete/' + pid  ,
                data: {
                    sn: id,
                    _token: token
                }
            }).done(function (res) {
                $('#error3').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });
            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#imageDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var pid = $(this).data('pid');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/patientImage/' + id + '/' + pid
            }).done(function (res) {
                $('#error4').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });
            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });

    $('body').on('click', '#deleteSalary', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var sid = $(this).data('staff');

        var check = confirm('Are you sure you want to delete? ');
        if(check) {
            $.ajax({
                method: 'GET',
                url: '/deleteSalary/' + id + '/' + sid
            }).done(function (res) {
                $('#error').show().html(res.data.message).delay(1500)
                    .queue(function (next) {
                        location.reload();
                    });
            }).fail(function (res) {
                console.log(res.data);
            });
        }
    });
});