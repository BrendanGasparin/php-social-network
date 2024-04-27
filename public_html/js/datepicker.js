var dayPicker = document.getElementById("day-picker");
var monthPicker = document.getElementById("month-picker");
var yearPicker = document.getElementById("year-picker");

var currentDate = new Date();
var currentYear = currentDate.getFullYear();

// Populate the years in the select box dropdown
for (var i = currentYear - 13; i > currentYear - 131; i--) {
    var option = document.createElement("option");
    option.textContent = i;
    option.value = i;
    yearPicker.appendChild(option);
}