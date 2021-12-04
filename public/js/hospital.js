$(document).ready(function () {
    $('#patientName').on('keyup', function (e) {
        e.preventDefault();
        var pid = $(this).val();

        var table = `<table class="table table-border table-striped custom-table datatable mb-0">
        <tr>
        <th>Name</th>
        <th>PatientID</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
        </tr>`;
        $.ajax({
            url: '/patientsearch/' + pid,
            method: 'GET'
        }).done(function (data) {
            if (data.value == 1) {
                $.each(data.data, function(data, value) {
                    table += `
                    <tr>
                    <td>${value.firstname}  ${value.lastname}</td>
                    <td>${value.kid}</td>
                    <td>${value.address}</td>
                    <td>${value.phone}</td>
                    <td>
                    <a class="btn btn-primary" id="edit" data-id=${value.pid}>Profile</a>
                    </div>
                    </div>
                    </td>
                    </tr>
                        `
//                        console.log(value.firstname);
                });
                table += `</table>`;
                $('#showTable').html(table);
            }

        }).fail(function (data) {
            $('#showTable').html(`<strong class='text-danger mt-5'>Record not found for this Patient</strong>`);
            if(pid == '' || pid.length < 1) {
                $('#showTable').html('');
            }
            console.log('Error Accessing');
        });


    });

    $('#patientReport').on('keyup', function (e) {
        e.preventDefault();
        var pid = $(this).val();
        var table = `<table class="table table-border table-striped custom-table datatable mb-0">
        <tr>
        <th>Name</th>
        <th>PatientID</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Action</th>
        </tr>`;
        $.ajax({
            url: '/patientsearch/' + pid,
            method: 'GET'
        }).done(function (data) {
            if (data.value == 1) {
                $.each(data.data, function(data, value) {
                    table += `
                    <tr>
                    <td>${value.firstname}  ${value.lastname}</td>
                    <td>${value.kid}</td>
                    <td>${value.address}</td>
                    <td>${value.phone}</td>
                    <td>
                    <a class="btn btn-primary" id="check" data-id=${value.pid}>Check</a>
                    </div>
                    </div>
                    </td>
                    </tr>
                        `
//                        console.log(value.firstname);
                });
                table += `</table>`;
                $('#showReport').html(table)
            }

        }).fail(function (data) {
            if(pid.trim() == '' || pid.length < 1) {
                $('#showReport').html('');
            } else {
                $('#showReport').html(`<strong class='text-danger mt-5'>Record not found for this Patient</strong>`);
            }

            console.log('Error Accessing');
        });
    });


    $('#staff').on('keyup', function (e) {
        e.preventDefault();
        var name = $(this).val();
        var table = `<table class="table table-border table-striped custom-table datatable mb-0">
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Enail</th>
        <th>Action</th>
        </tr>`;
        $.ajax({
            url: '/staffsearch/' + name,
            method: 'GET'
        }).done(function (data) {
            if (data.value == 1) {
                $.each(data.data, function(data, value) {
                    table += `
                    <tr>
                    <td>${value.firstname}</td>
                    <td>${value.lastname}</td>
                    <td>${value.phone}</td>
                    <td>${value.email}</td>
                    <td>
                    <a class="btn btn-primary" id="staffProfile" data-id=${value.sid}>Profile</a>
                    </td>
                    </tr>
                        `
//                        console.log(value.firstname);
                });
                table += `</table>`;
                $('#showStaff').html(table)
            }
        }).fail(function (data) {
            if(name.trim() == '' || name.length < 1) {
                $('#showStaff').html('');
            } else {
                $('#showStaff').html(`<strong class='text-danger mt-3'>Records Not found</strong>`);
            }
            //$('#showStaff').html('');
            //console.log('Error Accessing');
        });
    });
    $('body').on('click','#edit', function () {
       var pid =  $(this).data('id');
        //window.location.href = ''
        var hashpid = '123fade.'+'7rt543gtdtvcfy3tv.'+'12ew3gdt5.'+'123098.'+'5fq65er6qfhfq2rh2y8.' +
            'ihcki7qyhc265356vcvrvg178yb.' +
            'uiou89y78yui873ur72yjfu2aatgu.'+pid;
        $(location).attr('href','/patientgetsearch/'+hashpid);
    });

    $('body').on('click','#check', function () {
       var pid =  $(this).data('id');
        //window.location.href = ''
        var hashpid = '123fade.'+'7rt543gtdtvcfy3tv.'+'12ew3gdt5.'+'123098.'+'5fq65er6qfhfq2rh2y8.' +
            'ihcki7qyhc265356vcvrvg178yb.' +
            'uiou89y78yui873ur72yjfu2aatgu.'+pid;
        $(location).attr('href','/patientgetpatientreport/'+hashpid);
    });


    $('body').on('click','#staffProfile', function () {
        var sid =  $(this).data('id');
        //window.location.href = ''
        var hashpid = '123fade.'+'7rt543gtdtvcfy3tv.'+'12ew3gdt5.'+'123098.'+'5fq65er6qfhfq2rh2y8.' +
            'ihcki7qyhc265356vcvrvg178yb.' +
            'uiou89y78yui873ur72yjfu2aatgu.'+ sid;
        $(location).attr('href','/getstaffprofile/'+ hashpid);
    });
    //$('.mdb-select').materialSelect();

    $('#setInfo').on('click', function (e) {
        e.preventDefault();
        var symptoms    = $('#symptoms').val().trim();
        var medication  = $('#medication').val().trim();
        var token    = $('#token').val();
        var id    = $('#id').val();
        var pid    = $('#pid').val();

        if(symptoms.length == 0 || medication.length == 0) {
            alert('Please All Fields Are Required');
            $('#showSuccess').show().html('All Fields Are required').hide(25000);
        } else {
            $.ajax({
                method: 'POST',
                url: '/setMedication/'+pid,
                data: {
                    symptoms: symptoms,
                    medication: medication,
                    _token: token,
                    id: id
                }
            }).done(function(data) {
                $('#showSuccess').show().html(data.message).delay(50000, function() {
                    location.reload();
                });
                console.log(data);
            });
        }
    });

    // a method to show transaction details base on transaction id
    $('body').on('click', '#moreDetails', function(e) {
        e.preventDefault();
        var no = 0;
        var sum = 0;
        var tableData = `<table class='table table-striped datatable'>
        <thead><tr>
        <th>S/n</th>
        <th>Amount</th>
        <th>Date</th><thead><tbody>`;
        var ref = $(this).data('id');
        var payable = $(this).data('pay');
        $('#moreDetail').modal('show');
        $('.modal-title').text('Transactional Details');
        $('.totalPay').text('Total Payable Amount: ' + payable);
        //$('.totalPay').addClass('text-success');
        //$('.debtPay').text('Total Expected Amount: ' + payable);

        $.ajax({
            method: 'GET',
            url: '/transactionDetails/'+ref
        }).done(function(res) {

            $.each(res.data, function (data, value) {
                no += 1;
                sum += value.amount;
                var date = new Date(value.created_at);
                var dateString = date.getDay() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                tableData += `
                    <tr>
                        <td>${no}</td>
                        <td>${value.amount}</td>
                        <td>${date}</td></tr>`
            });
            tableData += `
                <tr><th >Total Paid Amount</th>
                    <th colspan='2'>${sum}</th></tr>
                <tr><th >Total Expected Amount</th>
                <th colspan='2'>${payable - sum}</th></tr>
                </tbody></table>`;
            $('.modal-body').html(tableData);

            console.log(res.data);
        });
        //$('.close').addClass('float-right');

    });
    $('#submitSms').on('submit', function (e) {
        e.preventDefault();

        var message = $('#message').val();
        var pid = $('#sendSms').data('id');
        var api_key = '8c3fd7e1';
        var recipient = 2347036192765;
        var sender = 'Adebayo';
        var route = 3;

        var username = 'covisadmin';
        var password = '*#06#';
        if(message.length > 0 && message != '') {
            $.ajax({
                method: 'GET',
                //headers: {  'Access-Control-Allow-Origin': '*' },
                url: 'https://flexrecharge.com/api/v1/http.php?api_key='+api_key+'&recipient='+recipient+'&message='+message+'&sender='+sender+'&route='+route
            }).done(function (data) {
                console.log(data);
                $('#showSmsAlert').show().html('Sms Sent Successfully');
            });

            //$.ajax({
            //    method: 'GET',
            //    url: 'https://covisclubinternational.com/info/api?username='+username+'&password='+ encodeURI(password)
            //}).done(function (data) {
            //    console.log(data);
            //    //$('#showSmsAlert').show().html(data);
            //});
        }
    })
});