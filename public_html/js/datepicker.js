var dayPicker = document.getElementById("day-picker");
var monthPicker = document.getElementById("month-picker");
var yearPicker = document.getElementById("year-picker");

var currentDate = new Date();
var currentYear = currentDate.getFullYear();

var selectedMonth = currentDate.getMonth() + 1;
var selectedDay = currentDate.getDate();
var selectedYear = currentYear - 13;
monthPicker.value = selectedMonth;
dayPicker.value = currentDate;

// Populate the years in the select box dropdown
for (var i = currentYear - 13; i > currentYear - 131; i--) {
    var option = document.createElement("option");
    option.textContent = i;
    option.value = i;
    yearPicker.appendChild(option);
}

// When the month picker changes we need to update the day picker values
monthPicker.addEventListener("change", function() {
    selectedMonth = monthPicker.value;
    populateDays();
});
// When the year picker changes we may need to update the day picker values (for leap years)
yearPicker.addEventListener("change", function() {
    selectedYear = yearPicker.value;
    populateDays();
});

// When we load the page we need to update the day picker values
populateDays();
dayPicker.value = selectedDay;

// Populate the days select dropdown according to the selected month and year
function populateDays() {
    var month = monthPicker.value;
    var year = yearPicker.value;
    var days;

    // Remove all child nodes of the day picker
    while(dayPicker.firstChild) {
        dayPicker.removeChild(dayPicker.firstChild);
    }
    
    // TODO: handle leap years
    if (month == 2) {
        days = 28;
    }
    else if (month == 9 || month == 4 || month == 6 || month == 11) {
        days = 30;
    }
    else {
        days = 31;
    }

    for (var i = 1; i <= days; i++) {
        var option = document.createElement("option");
        option.textContent = i;
        option.value = i;
        dayPicker.appendChild(option);
    }
}