var baseurl = "https://demo.smart-school.in/";
var start_week=1;
var chk_validate="XC34Y6-T8RM64-3D4DM5-dHVybmIrbldVN0hLdlJiQ010WEYzczdmTjQrRmFFT1dCNmJzYjNDNzlhOD0=";

$.widget.bridge('uibutton', $.ui.button);
$('body').tooltip({
    selector: '[data-toggle]',
    trigger: 'click hover',
    placement: 'top',
    delay: {
        show: 50,
        hide: 400
    }
});
$(function () {
    $('.languageselectpicker').selectpicker();
});

$(document).ready(function () {
    $(".studentsidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('.studentsideclose, .overlay').on('click', function () {
        $('.studentsidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('.studentsidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

$(document).ready(function () {

});

function complete_event(id, status) {
    $.ajax({
        url: "https://demo.smart-school.in/admin/calendar/markcomplete/" + id,
        type: "POST",
        data: {id: id, active: status},
        dataType: 'json',
        success: function (res)
        {
            if (res.status == "fail") {
                var message = "";
                $.each(res.error, function (index, value) {
                    message += value;
                });
                errorMsg(message);
            } else {
                successMsg(res.message);
                window.location.reload(true);
            }
        }
    });
}

function markc(id) {
    $('#newcheck' + id).change(function () {
        if (this.checked) {
            complete_event(id, 'yes');
        } else {
            complete_event(id, 'no');
        }
    });
}

$('#multiBranchSwitchModal').on('show.bs.modal', function (event) {

    var $modalDiv = $(event.delegateTarget);
    $('.branchSwitchbody').html("");
    $.ajax({
        type: "POST",
        url: baseurl + "admin/multibranch/branch/switchbranchlist",
        dataType: 'JSON',
        data: {},
        beforeSend: function () {
            $modalDiv.addClass('modal_loading');
        },
        success: function (data) {
            $('.branchSwitchbody').html(data.page);
        },
        error: function (xhr) { // if error occured
            $modalDiv.removeClass('modal_loading');
        },
        complete: function () {
            $modalDiv.removeClass('modal_loading');
        },
    });
});

$(document).on('change', '.branch_chg', function () {
    if ($(this).is(":checked")) {

        $('input.branch_chg').not(this).prop('checked', false);
    } 

});

$("#form_branch_change").on('submit', (function (e) {
    e.preventDefault();

    var form = $(this);
    var $this = $(this).find("button[type=submit]:focus");
    $.ajax({
        url: form.attr('action'),
        type: "POST",
        data: form.serialize(), // serializes the form's elements.
        dataType: 'json',
    
        beforeSend: function () {
            $this.button('loading');
        },
        success: function (res)
        {
                if (res.status) {
                    successMsg(res.message);
                    $('#multiBranchSwitchModal').modal('hide');
                    window.location.href = baseurl + "admin/multibranch/branch";

                } else {
                    errorMsg(res.message);
                }
        },
        error: function (xhr) { // if error occured
            alert("Error occured.please try again");
            $this.button('reset');
        },
        complete: function () {
            $this.button('reset');
        }

    });
}));

var calendar_date_time_format = 'MM/DD/YYYY';

var datetime_format = 'MM/DD/YYYY';

var date_format = 'mm/dd/yyyy';

function savedata(eventData) {
    var base_url = 'https://demo.smart-school.in/';
    $.ajax({
        url: base_url + 'admin/calendar/saveevent',
        type: 'POST',
        data: eventData,
        dataType: "json",
        success: function (msg) {
            alert(msg);

        }
    });
}

$calendar = $('#calendar');
var base_url = 'https://demo.smart-school.in/';
today = new Date();
y = today.getFullYear();
m = today.getMonth();
d = today.getDate();
var viewtitle = 'month';
var pagetitle = "Dashboard";

if (pagetitle == "Dashboard") {
    viewtitle = 'agendaWeek';
}

$calendar.fullCalendar({
    viewRender: function (view, element) {

    },

    header: {
        center: 'title',
        right: 'month,agendaWeek,agendaDay',
        left: 'prev,next,today'
    },
    firstDay: start_week,
    defaultDate: today,
    defaultView: viewtitle,
    selectable: true,
    selectHelper: true,
    views: {
        month: {// name of view
            titleFormat: 'MMMM YYYY'
                    // other view-specific options here
        },
        week: {
            titleFormat: " MMMM D YYYY"
        },
        day: {
            titleFormat: 'D MMM, YYYY'
        }
    },
    timezone: 'UTC',
    draggable: false,
    locale: 'en',
    editable: false,
    eventLimit: false, // allow "more" link when too many events

    // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
    events: {
        url: base_url + 'admin/calendar/getevents'

    },

    eventRender: function (event, element) {

        element.attr('title', event.title);
        element.attr('onclick', event.onclick);
        element.attr('data-toggle', 'tooltip');
        if ((!event.url) && (event.event_type != 'task')) {
            element.attr('title', event.title + '-' + event.description);
            element.click(function () {
                view_event(event.id);
            });
        }

    },
    dayClick: function (date, jsEvent, view) {
    console.log('Clicked on the entire day: ' + date.format());


            var newEventModal= $('#newEventModal');
            $("#input-field").val('');
            $("#desc-field").text('');
            var event_start_from = new Date(date);
            console.log(event_start_from.toISOString());
            $('.event_from',newEventModal).data("DateTimePicker").date(event_start_from);
            $('.event_to',newEventModal).data("DateTimePicker").date(event_start_from);
            $('#newEventModal').modal('show');

        return false;
    }

});

function view_event(id) {

    $('.selectevent').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
    var base_url = 'https://demo.smart-school.in/';
    if (typeof (id) == 'undefined') {
        return;
    }
    $.ajax({
        url: base_url + 'admin/calendar/view_event/' + id,
        type: 'POST',
        //data: '',
        dataType: "json",
        success: function (msg) {

            $("#event_title").val(msg.event_title);
            $("#event_desc").text(msg.event_description);

            $('#eventid').val(id);
            if (msg.event_type == 'public') {
                $('input:radio[name=eventtype]')[0].checked = true;

            } else if (msg.event_type == 'private') {
                $('input:radio[name=eventtype]')[1].checked = true;

            } else if (msg.event_type == 'sameforall') {
                $('input:radio[name=eventtype]')[2].checked = true;

            } else if (msg.event_type == 'protected') {
                $('input:radio[name=eventtype]')[3].checked = true;

            }
            //===========

            var __viewModal=$('#viewEventModal');
var event_start_from = new Date(msg.start_date);
$('.event_from',__viewModal).data("DateTimePicker").date(event_start_from);

var event_end_to = new Date(msg.end_date);
$('.event_to',__viewModal).data("DateTimePicker").date(event_end_to);
            //============

            $("#event_color").val(msg.event_color);
            $("#delete_event").attr("onclick", "deleteevent(" + id + ",'Event')");
            $("#" + msg.colorid).removeClass('cpicker-small').addClass('cpicker-big');
            $('#viewEventModal').modal('show');
        }
    });
}

$(document).ready(function (e) {
    $("#addevent_form").on('submit', (function (e) {

        e.preventDefault();

        $(".submit_addevent").prop("disabled", true);

        $.ajax({
            url: "https://demo.smart-school.in/admin/calendar/saveevent",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (res)
            {

                if (res.status == "fail") {

                    var message = "";
                    $.each(res.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);

                } else {

                    successMsg(res.message);

                    window.location.reload(true);
                }
                $(".submit_addevent").prop("disabled", false);
            }
        });
    }));
});

$(document).ready(function (e) {
    $("#updateevent_form").on('submit', (function (e) {

        e.preventDefault();
        $(".submit_update").prop("disabled", true);
        $.ajax({
            url: "https://demo.smart-school.in/admin/calendar/updateevent",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (res)
            {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function (index, value) {
                        message += value;
                    });
                    errorMsg(message);

                } else {

                    successMsg(res.message);
                    window.location.reload(true);
                } $(".submit_update").prop("disabled", false);
            }
        });
    }));
});

function deleteevent(id, msg) {
    if (typeof (id) == 'undefined') {
        return;
    }
    if (confirm("Are You Sure Want To Delete? ")) {
        $.ajax({
            url: base_url + 'admin/calendar/delete_event/' + id,
            type: 'POST',
            dataType: "json",
            success: function (res) {
                if (res.status == "fail") {
                    errorMsg(res.message);
                } else {
                    successMsg(msg + " Record Delete Successfully");
                    window.location.reload(true);
                }
            }
        })
    }
}

$("body").on('click', '.cpicker', function () {
    var color = $(this).data('color');
    // Clicked on the same selected color
    if ($(this).hasClass('cpicker-big')) {
        return false;
    }

    $(this).parents('.cpicker-wrapper').find('.cpicker-big').removeClass('cpicker-big').addClass('cpicker-small');
    $(this).removeClass('cpicker-small', 'fast').addClass('cpicker-big', 'fast');
    if ($(this).hasClass('kanban-cpicker')) {
        $(this).parents('.panel-heading-bg').css('background', color);
        $(this).parents('.panel-heading-bg').css('border', '1px solid ' + color);
    } else if ($(this).hasClass('calendar-cpicker')) {
        $("body").find('input[name="eventcolor"]').val(color);
    }
});

$(document).ready(function () {
    moment.lang('en', {
    week: { dow: start_week }
    });

    $("body").delegate(".date", "focusin", function () {
        $(this).datepicker({
            todayHighlight: false,
            format: date_format,
            autoclose: true,
            weekStart : start_week,
            language: 'en'
        });
    });

    $("body").delegate(".datetime", "focusin", function () {
        $(this).datetimepicker({
            format: calendar_date_time_format + ' hh:mm a'

        });
    });

    $('body').on('focus',".date_fee", function(){
    $(this).datepicker({
        format: date_format,
        autoclose: true,
        language: 'en',
        endDate: '+0d',
        startDate: '',
        weekStart : start_week,
        todayHighlight: true
    });
});

    $('.datetime_twelve_hour').datetimepicker({
        format:  calendar_date_time_format + ' hh:mm a'
    });


        $("#event_date").daterangepicker({
        timePickerIncrement: 5,
        locale: {
        format: calendar_date_time_format
        }
    });

///================

    $('.event_from').datetimepicker({
        format:  calendar_date_time_format + ' hh:mm A',
    });

    $('.event_to').datetimepicker({
        format:  calendar_date_time_format + ' hh:mm A',
    });

//==============

});

function loadDate() {

    var date_format = 'mm/dd/yyyy';

    $('.date').datetimepicker({
        format: datetime_format,
        locale:
                'en',

    });
}

// showdate('this_year');

function showdate(type) {

        var date_from = '07/01/2024';
        var date_to = '07/01/2024';

    if (type == 'period') {

        $.ajax({
            url: base_url + 'Report/get_betweendate/' + type,
            type: 'POST',
            data: {date_from: date_from, date_to: date_to},
            success: function (res) {

                $('#date_result').html(res);

                loadDate();
            }

        });

    } else {
        $('#date_result').html('');
    }

}

$(document).on('change','#currencySwitcher',function(e){
        $.ajax({
            type: 'POST',
            url: baseurl+'admin/currency/change_currency',
            data: {currency_id: $(this).val()},
            dataType: 'JSON',
            beforeSend: function() {

            },
            success: function(data) {

                successMsg(data.message);
                if(data.status){

            window.location.reload('true');
                }
            },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");

            },
            complete: function() {

            }
        });
});

$calendar_event = $('#calendar_event');

$calendar_event.fullCalendar({
    viewRender: function (view, element) {

    },

    header: {
        center: 'title',
        right: '',
        left: 'prev,next'
    },
    firstDay: start_week,
    displayEventTime : false,
    defaultDate: today,
    defaultView: viewtitle,
    selectable: true,
    selectHelper: true,
    views: {
        month: {// name of view
            titleFormat: 'MMMM YYYY'
                    // other view-specific options here
        }
    },
    timezone: 'UTC',
    draggable: false,
    locale: 'en',
    editable: false,
    eventLimit: false, // allow "more" link when too many events

    // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
    events: {
        url: base_url + 'admin/alumni/getevent'

    },

    eventRender: function (event, element) {

        element.attr('title', event.title);
        element.attr('data-toggle', 'tooltip');
        element.click(function () {

            view_event_data(event.id);
        });
    }

});