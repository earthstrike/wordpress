function padZeros(n) {
   if(n < 10) {
      return("0" + n);
   } else {
      return(n);
   }
}

function earthCounter(elementId, updateInterval=100, countDownDate="January 15, 2019") {
   var countDownTime = new Date(countDownDate).getTime();
   var x = setInterval(function() {
      var now = new Date().getTime();

      var distance = countDownTime - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = padZeros(Math.floor((distance % (1000 * 60 * 60 * 24))/(1000 * 60 * 60)));
      var minutes = padZeros(Math.floor((distance % (1000 * 60 * 60)) /(1000 * 60)));
      var seconds = padZeros(Math.floor((distance % (1000 * 60)) / 1000));

      document.getElementById(elementId).innerHTML = days + " days " + hours + " hours " + minutes + " minutes " + seconds + " seconds";

   }, updateInterval);
}
