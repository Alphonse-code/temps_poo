
let [milliseconds,seconds,minutes,hours] = [0,0,0,0];

 let timerRef = document.querySelector('.timerDisplay');  
 let currentInterval = null;  

 
 function displayTimer() {
  let last = localStorage.getItem('last_time');

  if (typeof last !== 'undefined' && last !== null){
      var [he,min,sec] = last.split(':');
      seconds=parseInt(sec);
      minutes=parseInt(min);
      hours=parseInt(he);
      localStorage.removeItem('last_time');
  }

   milliseconds+=10;  
   if(milliseconds == 1000){  
     milliseconds = 0;  
     seconds++;  
     if(seconds == 60){  
       seconds = 0;  
       minutes++;  
       if(minutes == 60){  
         minutes = 0;  
         hours++;  }  
     }  
   }  

  
  let h = hours < 10 ? "0" + hours : hours;  
  let m = minutes < 10 ? "0" + minutes : minutes;  
  let s = seconds < 10 ? "0" + seconds : seconds;  
  //let ms = milliseconds < 10 ? "00" + milliseconds : milliseconds < 100 ? "0" + milliseconds : milliseconds;  
  timerRef.innerHTML = ` ${h} : ${m} : ${s} `;

 }  

  function timer(){
    if(currentInterval!==null){  
     clearInterval(currentInterval);  
   }  
    currentInterval = setInterval(displayTimer,10); 
   }

 document.getElementById('pauseTimer').addEventListener('click', ()=>{  
   clearInterval(currentInterval);  
  timerRef.innerHTML = ` ${00} : ${00} : ${00} `; 
 
 });  


 function calcule(duration) {

    var milliseconds = Math.floor((duration % 1000) / 100),
        seconds = Math.floor((duration / 1000) % 60),
        minutes = Math.floor((duration / (1000 * 60)) % 60),
        hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;
        return hours + ":" + minutes + ":" + seconds ;
    }
    