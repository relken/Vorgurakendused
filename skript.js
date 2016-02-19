var clock = document.getElementById("countdown-holder")
    , targetDate = new Date(2050, 00, 01); // Jan 1, 2050;
 
  clock.innerHTML = countdown(targetDate).toString();
  setInterval(function(){
    clock.innerHTML = countdown(targetDate).toString();
  }, 1000);
