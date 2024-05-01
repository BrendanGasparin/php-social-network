var dayPicker = document.getElementById("day-picker");      // Day <select> element
var monthPicker = document.getElementById("month-picker");  // Month <select> element
var yearPicker = document.getElementById("year-picker");    // Year <select> element

var currentDate = new Date();                               // Today's date
var currentYear = currentDate.getFullYear();                // The current year

var selectedMonth = currentDate.getMonth() + 1;             // The currently selected month
var selectedDay = currentDate.getDate();                    // The currently selected day
var selectedYear = currentYear - 13;                        // The currently selected year

// Set the current month
monthPicker.value = selectedMonth;

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

// Populate the days <select> dropdown according to the selected month and year
function populateDays() {
    var month = monthPicker.value;
    var year = yearPicker.value;
    var day = dayPicker.value;
    var days;

    // Remove all child nodes of the day <select>
    while(dayPicker.firstChild) {
        dayPicker.removeChild(dayPicker.firstChild);
    }
    
    // Determine number of days in the selected month for the selected year
    // (watching out for leap years)
    if (month == 2 && year % 100 == 0 && year % 400 == 0) {
        days = 29;
    }
    else if (month == 2 && year % 100 == 0) {
        days = 28;
    }
    else if (month == 2 && year % 4 == 0) {
        days = 29;
    }
    else if (month == 2) {
        days = 28;
    }
    else if (month == 9 || month == 4 || month == 6 || month == 11) {
        days = 30;
    }
    else {
        days = 31;
    }

    // Append the new child nodes to the day <select>
    for (var i = 1; i <= days; i++) {
        var option = document.createElement("option");
        option.textContent = i;
        option.value = i;

        // Do not change the selected day unless that day
        // does not exist in the selected month and year
        if (i == day)
            option.selected = true;

        dayPicker.appendChild(option);
    }
}
