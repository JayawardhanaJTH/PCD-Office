let date = new Date();
var eventsDates = [];
var eventsMonths = new Set();
var eventsYears = new Set();
var eventsIDs = [];
var counter = 0;

function loadDates(dates, months, years, ids) {
  for (let i = 0; i < dates.length; i++) {
    eventsDates.push(dates[i]);
  }
  for (let i = 0; i < ids.length; i++) {
    eventsIDs.push(ids[i]);
  }
  for (let i = 0; i < months.length; i++) {
    eventsMonths.add(months[i]);
  }
  for (let i = 0; i < years.length; i++) {
    eventsYears.add(years[i]);
  }
  dateGenerate();
}

let dateGenerate = function () {
  const year = date.getFullYear();
  const month = date.getMonth() + 1;

  //past month last day
  const pmlastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

  //current month first day index
  const cmfirstDayIndex = new Date(
    date.getFullYear(),
    date.getMonth(),
    1
  ).getDay();
  //current month last day index
  const cmlastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();
  //current month last day
  const cmlastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const today = date.getDate();

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  const monthDays = document.querySelector(".day");

  document.querySelector(".days h1").innerHTML = months[date.getMonth()];

  document.querySelector(".days p").innerHTML = date.toDateString();

  let days = "";

  for (let i = cmfirstDayIndex - 1; i >= 0; i--) {
    let temp = pmlastDay - i;
    days += '<div class="text-info">' + temp + "</div>";
  }

  for (let i = 1; i <= cmlastDay; i++) {
    if (i === today) {
      let flag = false;

      for (let j = 0; j < eventsDates["length"]; j++) {
        if (
          i == eventsDates[j] &&
          eventsMonths.has(month.toString()) &&
          eventsYears.has(year.toString())
        ) {
          flag = true;
          days +=
            '<a href="php/event-add.php?view_id=' +
            eventsIDs[j] +
            '" > <div class="today">' +
            i +
            "</div></a>";
        }
      }
      if (!flag) {
        days += '<div class="today">' + i + "</div>";
      }
    } else {
      let flag = false;

      for (let j = 0; j < eventsDates["length"]; j++) {
        if (
          i == eventsDates[j] &&
          eventsMonths.has(month.toString()) &&
          eventsYears.has(year.toString())
        ) {
          flag = true;
          days +=
            '<a class="bg-info" href="php/event-add.php?view_id=' +
            eventsIDs[j] +
            '" >' +
            i +
            "</a>";
        }
      }
      if (!flag) {
        days += "<div>" + i + "</div>";
      }
    }
  }

  if (
    (cmfirstDayIndex == 5 && cmlastDay == 31) ||
    (cmfirstDayIndex == 6 && cmlastDay == 31)
  ) {
    for (let i = cmlastDayIndex + 1; i <= 6; i++) {
      let temp = i - cmlastDayIndex;
      days += '<div class="text-info">' + temp + "</div>";
    }
  } else if (cmfirstDayIndex == 6 && cmlastDay == 30) {
    for (let i = cmlastDayIndex + 1; i <= 6; i++) {
      let temp = i - cmlastDayIndex;
      days += '<div class="text-info">' + temp + "</div>";
    }
  } else {
    for (let i = cmlastDayIndex + 1; i <= 13; i++) {
      let temp = i - cmlastDayIndex;
      days += '<div class="text-info">' + temp + "</div>";
    }
  }

  monthDays.innerHTML = days;
};

$(".pre").click(function () {
  counter--;
  date.setMonth(date.getMonth() - 1);
  dateGenerate();
});

$(".next").click(function () {
  counter++;
  date.setMonth(date.getMonth() + 1);
  dateGenerate();
});
