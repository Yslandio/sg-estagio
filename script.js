function mondayCheckBox() {
    let monday = document.querySelector('#monday');

    if(monday.checked) {
        document.querySelector('#hoursMonday').disabled = false;
        document.querySelector('#minutesMonday').disabled = false;
        if (document.querySelector('#hoursMonday').value == '') document.querySelector('#hoursMonday').value = 0;
        if (document.querySelector('#minutesMonday').value == '') document.querySelector('#minutesMonday').value = 0;
    } else {
        document.querySelector('#hoursMonday').disabled = true;
        document.querySelector('#minutesMonday').disabled = true;
        document.querySelector('#hoursMonday').value = '';
        document.querySelector('#minutesMonday').value = '';
    }
}

function tuesdayCheckBox() {
    let tuesday = document.querySelector('#tuesday');

    if(tuesday.checked) {
        document.querySelector('#hoursTuesday').disabled = false;
        document.querySelector('#minutesTuesday').disabled = false;
        if (document.querySelector('#hoursTuesday').value == '') document.querySelector('#hoursTuesday').value = 0;
        if (document.querySelector('#minutesTuesday').value == '') document.querySelector('#minutesTuesday').value = 0;
    } else {
        document.querySelector('#hoursTuesday').disabled = true;
        document.querySelector('#minutesTuesday').disabled = true;
        document.querySelector('#hoursTuesday').value = '';
        document.querySelector('#minutesTuesday').value = '';
    }
}

function wednesdayCheckBox() {
    let wednesday = document.querySelector('#wednesday');

    if(wednesday.checked) {
        document.querySelector('#hoursWednesday').disabled = false;
        document.querySelector('#minutesWednesday').disabled = false;
        if (document.querySelector('#hoursWednesday').value == '') document.querySelector('#hoursWednesday').value = 0;
        if (document.querySelector('#minutesWednesday').value == '') document.querySelector('#minutesWednesday').value = 0;
    } else {
        document.querySelector('#hoursWednesday').disabled = true;
        document.querySelector('#minutesWednesday').disabled = true;
        document.querySelector('#hoursWednesday').value = '';
        document.querySelector('#minutesWednesday').value = '';
    }
}

function thursdayCheckBox() {
    let thursday = document.querySelector('#thursday');

    if(thursday.checked) {
        document.querySelector('#hoursThursday').disabled = false;
        document.querySelector('#minutesThursday').disabled = false;
        if (document.querySelector('#hoursThursday').value == '') document.querySelector('#hoursThursday').value = 0;
        if (document.querySelector('#minutesThursday').value == '') document.querySelector('#minutesThursday').value = 0;
    } else {
        document.querySelector('#hoursThursday').disabled = true;
        document.querySelector('#minutesThursday').disabled = true;
        document.querySelector('#hoursThursday').value = '';
        document.querySelector('#minutesThursday').value = '';
    }
}

function fridayCheckBox() {
    let friday = document.querySelector('#friday');

    if(friday.checked) {
        document.querySelector('#hoursFriday').disabled = false;
        document.querySelector('#minutesFriday').disabled = false;
        if (document.querySelector('#hoursFriday').value == '') document.querySelector('#hoursFriday').value = 0;
        if (document.querySelector('#minutesFriday').value == '') document.querySelector('#minutesFriday').value = 0;
    } else {
        document.querySelector('#hoursFriday').disabled = true;
        document.querySelector('#minutesFriday').disabled = true;
        document.querySelector('#hoursFriday').value = '';
        document.querySelector('#minutesFriday').value = '';
    }
}

mondayCheckBox();
tuesdayCheckBox();
wednesdayCheckBox();
thursdayCheckBox();
fridayCheckBox();
