
var currentArticle = 0;

function returnBoundingInfo(elem) {
  var bounding = elem.getBoundingClientRect();
  return (
      bounding.top
    );
}

function updateNav() {
  var menu = document.getElementById("navList");
  var items = menu.getElementsByClassName("navItem");

  var articlesCount = items.length;
  var articles = document.getElementsByClassName("article");

  for (current = articlesCount - 1; current > -1; current--) {
    if (returnBoundingInfo(articles[current]) < 100) {
      break;
    }
  }

  if (current != currentArticle){
    currentArticle = current;
    updateStyle(current);
  }
}

function updateStyle(active) {
  var menu = document.getElementById("navList");
  var items = menu.getElementsByClassName("navItem");

  for (i = 0; i < items.length; i++) {
    if (i == items.length - 1) {
      if (i == active) {
        items[i].className = "navItem active last"
      }
      else {
        items[i].className = "navItem last"
      }
    }
    else {
      if (i == active) {
        items[i].className = "navItem active"
      }
      else {
        items[i].className = "navItem"
      }
    }
  }
}

function RMCInfo() {
  var title = "Top End Wedding";
  var rating = "M";
  var description = "Lauren and Ned have 10 days to find Lauren's mother who has gone AWOL in the remote far north of Australia so that they can reunite her parents and pull off their dream wedding.";
  var trailerUrl = 'https://www.youtube.com/embed/uoDBvGF9pPU';
  var times = ["6pm Monday","T18","MON", "6pm Tuesday","T18","TUE", "3pm Saturday","T15","SAT", "3pm Sunday","T15","SUN"]
  var movieID = "RMC";

  var buttons = createButtons(times, movieID);

  setSynopsis(title,rating,description,trailerUrl, buttons);
}
function ANMInfo() {
  var title = "Dumbo";
  var rating = "G";
  var description = "Struggling circus owner Max Medici enlists a former star and his two children to care for Dumbo, a baby elephant born with oversized ears. When the family discovers that the animal can fly, it soon becomes the main attraction.";
  var trailerUrl = 'https://www.youtube.com/embed/7NiYVoqBt-8';
  var times = ["12pm Monday","T12","MON", "12pm Tuesday","T12","TUE", "6pm Wednesday","T18","WED", "6pm Thursday","T18","THU", "6pm Friday","T18","FRI", "12pm Saturday","T12","SAT", "12pm Sunday","T12","SUN"]
  var movieID = "ANM";

  var buttons = createButtons(times, movieID);

  setSynopsis(title,rating,description,trailerUrl, buttons);
}
function AHFInfo() {
  var title = "The Happy Prince";
  var rating = "R";
  var description = "His body ailing, Oscar Wilde lives out his last days in exile, observing the difficulties and failures surrounding him with ironic detachment, humour, and the wit that defined his life.";
  var trailerUrl = 'https://www.youtube.com/embed/4HmN9r1Fcr8'
  var times = ["12pm Wednesday","T12","WED", "12pm Thursday","T12","THU", "12pm Friday","T12","FRI", "9pm Saturday","T21","SAT", "9pm Sunday","T21","SUN"];
  var movieID = "AHF";

  var buttons = createButtons(times, movieID);
  setSynopsis(title,rating,description,trailerUrl, buttons);
}
function ACTInfo() {
  var title = "Avengers: Endgame";
  var rating = "PG";
  var description = "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.";
  var trailerUrl = 'https://www.youtube.com/embed/TcMBFSGVi1c';
  var times = ["9pm Wednesday","T21", "WED", "9pm Thursday","T21", "THU", "9pm Friday","T21", "FRI", "6pm Saturday","T18", "SAT", "6pm Sunday", "T18", "SUN",];
  var movieID = "ACT";

  var buttons = createButtons(times, movieID);

  setSynopsis(title,rating,description,trailerUrl, buttons);
}

function createButtons(times, title) {
  var buttonString = "";
  for (i = 0; i < times.length; i = i + 3) {
    buttonString += "<button onclick=submitValue('" + title + "','" + times[i+1] + "','" + times[i+2] + "')>" + times[i] + "</button>"
  }
  return buttonString;
}

function setSynopsis(title,rating,description,trailerUrl, buttons) {
  var sTitle = document.getElementById("synopsisTitle");
  var sRating = document.getElementById("synopsisRating");
  var sDescription = document.getElementById("synopsisVerticalDetails");
  var sVideo = document.getElementById("synopsisVideo");
  var sBookingButtons = document.getElementById("synopsisHorizontalButtons");

  sTitle.textContent = title;
  sRating.textContent = rating;
  sDescription.textContent = description;
  sVideo.src = trailerUrl;
  sBookingButtons.innerHTML = buttons;
}

function submitValue(title,time,day) {
  var titleField = document.getElementById("formTitle");
  var timeField = document.getElementById("formHour");
  var dayField = document.getElementById("formDay");
  var movieIdentify = document.getElementById("movieCheck");
  var orderButton = document.getElementById("orderButton");
  titleField.value = title;
  timeField.value = time;
  dayField.value = day;
  title = returnTitle(title);
  movieIdentify.innerHTML = "Booking Form <br />" + title + " <br />" + time + " " + day;
  orderButton.disabled = false;

  changeDayTime();
}

var totalPrice = 0;
var recordedTickets = [0,0,0,0,0,0];
var currentDay = null;
var currentTime = null;

function ticketChange(type) {
  var selected = document.getElementById(type);
  var number = selected.value;
  var price = 0;
  var discount = 0;
  var oldTickets = 0;

  switch (type) {
    case 'FCA':
      recordedTickets[0] = number;
      break;
    case 'FCP':
      recordedTickets[1] = number;
      break;
    case 'FCC':
      recordedTickets[2] = number;
      break;
    case 'STA':
      recordedTickets[3] = number;
      break;
    case 'STP':
      recordedTickets[4] = number;
      break;
    case 'STC':
      recordedTickets[5] = number;
      break;
    default:
      console.log('AW DANG');
      break;
  }

  updatePrice();

}

function changeDayTime() {
  currentTime = document.getElementById("formHour").value;
  currentDay = document.getElementById("formDay").value;
  updatePrice();
}

function updatePrice() {
  var priceField = document.getElementById("formPrice");
  var price = 0;
  var discount = 0;
  totalPrice = 0;
  for (var i = 0; i < recordedTickets.length; i++) {
    switch (i) {
      case 0:
        price = 30;
        discount = 24;
        break;
      case 1:
        price = 27;
        discount = 22.5;
        break;
      case 2:
        price = 24;
        discount = 21;
        break;
      case 3:
        price = 19.80;
        discount = 14;
        break;
      case 4:
        price = 17.5;
        discount = 12.5;
        break;
      case 5:
        price = 15.30;
        discount = 11;
        break;
      default:
        console.log('AW DANG');
        break;
    }

    var discountDays = ['MON','WED'];
    var midday = ['TUE','THU','FRI'];

    if (discountDays.includes(currentDay)) {
      totalPrice += discount * recordedTickets[i];
    }
    else if (midday.includes(currentDay) && currentTime == "T12") {
      totalPrice += discount * recordedTickets[i];
    }
    else {
      totalPrice += price * recordedTickets[i];
    }
  }
  priceField.value = totalPrice.toFixed(2);
}

function returnTitle(id) {
  switch (id) {
    case 'ACT':
      return "Avengers: Endgame";
      break;
    case 'ANM':
      return "Dumbo";
      break;
    case 'AHF':
      return "The Happy Prince";
      break;
    case 'RMC':
      return "Top End Wedding";
      break;
    default:
      console.log('AW DANG');
      break;
  }
}




