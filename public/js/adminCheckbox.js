$(document).ready(function () {
    var total = $('#count').data('id');
    var data = [];
    //for (var i=1; i<=total; i++) {
    $('body').on('click','#adminAddPatient', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            //console.log('checked ' + sid + ' Add Patient');
            addRole1(id, "addPatient", token);
        } else {
            addRole0(id, "addPatient", token);
            //console.log('unchecked ' + sid  + ' Add Patient');
        }
    });

    $('body').on('click','#adminSetSickness', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            //console.log('checked ' + sid + ' Set Sickness');
            addRole1(id, "setSickness", token);
        } else {
            addRole0(id, "setSickness", token);
            //console.log('unchecked ' + sid + ' Set Sickness');
        }
    });

    $('body').on('click','#adminSetPay', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "setPay", token);
        } else {
            addRole0(id, "setPay", token);
        }
    });

    $('body').on('click','#adminConfirmPay', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "confirmPay", token);
        } else {
            addRole0(id, "confirmPay", token);
        }
    });

    $('body').on('click','#adminEditPay', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "editPay", token);
        } else {
            addRole0(id, "editPay", token);
        }
    });

    $('body').on('click','#adminAddReport', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "addReport", token);
        } else {
            addRole0(id, "addReport", token);
        }
    });

    $('body').on('click','#adminExpenditure', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "expenditure", token);
        } else {
            addRole0(id, "expenditure", token);
        }
    });

    $('body').on('click','#adminStock', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "stock", token);
        } else {
            addRole0(id, "stock", token);
        }
    });

    $('body').on('click','#adminAdmin', function () {
        var id = $(this).data('id');
        var token    = $(this).data('token');
        if($(this).is(':checked')) {
            addRole1(id, "admin", token);
        } else {
            addRole0(id, "admin", token);
        }
    });

    function addRole1(id, columnValue, token) {
        $.ajax({
            method: 'POST',
            url: '/adminAddRolePermission',
            data: {
                id: id,
                columnValue: columnValue,
                value: 1,
                _token: token
            }
        }).done(function (data) {
            location.reload();
        });
    }

    function addRole0(id, columnValue, token) {
        $.ajax({
            method: 'POST',
            url: '/adminAddRolePermission',
            data: {
                id: id,
                columnValue: columnValue,
                value: 0,
                _token: token
            }
        }).done(function (data) {
            location.reload();
        });
    }
    //console.log(data);
});