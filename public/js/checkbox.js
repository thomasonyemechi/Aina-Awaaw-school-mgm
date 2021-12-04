$(document).ready(function () {
    var total = $('#count').data('id');
    var data = [];
    //for (var i=1; i<=total; i++) {
        $('body').on('click','#addPatient', function () {
            var sid = $(this).data('sid');
            var token    = $(this).data('token');
            if($(this).is(':checked')) {
                //console.log('checked ' + sid + ' Add Patient');
                addRole1(sid, "addPatient", token);
            } else {
                addRole0(sid, "addPatient", token);
                //console.log('unchecked ' + sid  + ' Add Patient');
            }
        });

        $('body').on('click','#setSickness', function () {
            var sid = $(this).data('sid');
            var token    = $(this).data('token');
            if($(this).is(':checked')) {
                //console.log('checked ' + sid + ' Set Sickness');
                addRole1(sid, "setSickness", token);
            } else {
                addRole0(sid, "setSickness", token);
                //console.log('unchecked ' + sid + ' Set Sickness');
            }
        });

        $('body').on('click','#setPay', function () {
            var sid = $(this).data('sid');
            var token    = $(this).data('token');
            if($(this).is(':checked')) {
                addRole1(sid, "setPay", token);
            } else {
                addRole0(sid, "setPay", token);
            }
        });

    $('body').on('click','#confirmPay', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "confirmPay", token);
        } else {
            addRole0(sid, "confirmPay", token);
        }
    });

    $('body').on('click','#editPay', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "editPay", token);
        } else {
            addRole0(sid, "editPay", token);
        }
    });

    $('body').on('click','#addReport', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "addReport", token);
        } else {
            addRole0(sid, "addReport", token);
        }
    });

    $('body').on('click','#expenditure', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "expenditure", token);
        } else {
            addRole0(sid, "expenditure", token);
        }
    });

    $('body').on('click','#stock', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "stock", token);
        } else {
            addRole0(sid, "stock", token);
        }
    });

    $('body').on('click','#admin', function () {
        var sid = $(this).data('sid');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(sid, "admin", token);
        } else {
            addRole0(sid, "admin", token);
        }
    });

    function addRole1(sid, columnValue, token) {
        $.ajax({
            method: 'POST',
            url: '/addRolePermission',
            data: {
                sid: sid,
                columnValue: columnValue,
                value: 1,
                _token: token
            }
        });
    }

    function addRole0(sid, columnValue, token) {
        $.ajax({
            method: 'POST',
            url: '/addRolePermission',
            data: {
                sid: sid,
                columnValue: columnValue,
                value: 0,
                _token: token
            }
        });
    }
    //console.log(data);
});