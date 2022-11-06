function weekDayCheckBox(weekDay) {
    let inputWeekDay = document.querySelector('#' + weekDay);

    if(inputWeekDay.checked) {
        document.querySelector('#hours_' + weekDay).disabled = false;
        document.querySelector('#minutes_' + weekDay).disabled = false;
        if (document.querySelector('#hours_' + weekDay).value == '') document.querySelector('#hours_' + weekDay).value = 0;
        if (document.querySelector('#minutes_' + weekDay).value == '') document.querySelector('#minutes_' + weekDay).value = 0;
    } else {
        document.querySelector('#hours_' + weekDay).disabled = true;
        document.querySelector('#minutes_' + weekDay).disabled = true;
        document.querySelector('#hours_' + weekDay).value = '';
        document.querySelector('#minutes_' + weekDay).value = '';
    }
}

weekDay = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
weekDay.forEach(day => {
    weekDayCheckBox(day);
});
