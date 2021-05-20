// Hier worden de gegevens en input velden opgehaald
var startTime = document.getElementById("van");
var valueSpan = document.getElementById("tot");

// Hier worden de tijden omgezeten naar secondes om vervolgens weer terug te rekenen
function timestrToSec(timestr) {
var parts = timestr.split(":");
return (parts[0] * 3600) +
        (parts[1] * 60) +
        (+parts[2]);
}

function pad(num) {
if(num < 10) {
    return "0" + num;
} else {
    return "" + num;
}
}

// Hier worden de secondes weer terug gerekend naar uren
function formatTime(seconds) {
return [pad(Math.floor(seconds/3600)),
    pad(Math.floor(seconds/60)%60),
    pad(seconds%60),
    ].join(":");
}

// Hier wordt de geformateerde variables in de values van de inputs gezet
startTime.addEventListener("input", function() {
time1 = startTime.value + ":00";
time2 = "01:30:00";

valueSpan.value = formatTime(timestrToSec(time1) + timestrToSec(time2));

// Hier wordt de cookie functie aangeroepen
createCookie("tot", formatTime(timestrToSec(time1) + timestrToSec(time2)), "10");
}, false);

// Hier wordt er een cookie aangemaakt om de data op te slaan in de database die uitgerekend is
function createCookie(name, value, days) {
var expires;

if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
}
else {
    expires = "";
}

document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}