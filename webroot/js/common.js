/* 
 * @author OanhNN
 * @date 20/03/2012
 */
function loadPiece(href,rd,divName){
    $(divName).load(href, {
        'rd':rd
    }, function(){
        var linkDivName = divName + " #pagination a";
        $(linkDivName).click(function() {
            var thisHref = $(this).attr("href");
            loadPiece(thisHref,rd,divName);
            return false;
        });
        $(".sortLink a").click(function(){
            var thisHref = $(this).attr("href");
            loadPiece(thisHref,rd,divName);
            return false;
        });
    });
}
function createDateTimeInput(inputid){
    $(inputid).datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'hh:mm',
        stepHour: 1,
        stepMinute: 5,
        minDate: 0,
        addSliderAccess: true,
        sliderAccessArgs: {
            touchonly: false
        }
    });
}
function createDateInput(inputid){
    $(inputid).datetimepicker({
        dateFormat: 'yy-mm-dd',
        showHour: false,
        showMinute: false,
        minDate: 0,
        addSliderAccess: true,
        sliderAccessArgs: {
            touchonly: false
        }
    });
}
function createTimeInput(inputid){
    $(inputid).datetimepicker({
        timeFormat: 'hh:mm',
        stepHour: 1,
        stepMinute: 5,
        minDate: 0,
        addSliderAccess: true,
        sliderAccessArgs: {
            touchonly: false
        }
    });
}
function createDateTimeRange(startinputid,endinputid){
    $(startinputid).datetimepicker('option','onClose',function(dateText, inst) {
        var endDateTextBox = $(endinputid);
        if (endDateTextBox.val() != '') {
            var testStartDate = new Date(dateText);
            var testEndDate = new Date(endDateTextBox.val());
            if (testStartDate > testEndDate)
                endDateTextBox.val(dateText);
        } else {
            endDateTextBox.val(dateText);
        }
    });
    $(startinputid).datetimepicker('option','onSelect',function (selectedDateTime){
        var start = $(this).datetimepicker('getDate');
        $(endinputid).datetimepicker('option', 'minDate', new Date(start.getTime()));
    });
    $(endinputid).datetimepicker('option','onClose',function(dateText, inst) {
        var startDateTextBox = $(startinputid);
        if (startDateTextBox.val() != '') {
            var testStartDate = new Date(startDateTextBox.val());
            var testEndDate = new Date(dateText);
            if (testStartDate > testEndDate)
                startDateTextBox.val(dateText);
        } else {
            startDateTextBox.val(dateText);
        }
    });
    $(endinputid).datetimepicker('option','onSelect',function (selectedDateTime){
        var end = $(this).datetimepicker('getDate');
        $(startinputid).datetimepicker('option', 'maxDate', new Date(end.getTime()) );
    });
}


