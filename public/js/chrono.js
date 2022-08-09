var h = 0, m = 0, s = 0;
function to_start() {
 //window.clearInterval(tm); // stop the timer 
    tm = window.setInterval('disp()', 1000); 
    
}
           
function disp() {
    let last = localStorage.getItem('last_time');
    console.log('last time from localstorage : ' + last);
  if (typeof last !== 'undefined' && last !== null){
      var [he,min,sec] = last.split(':');
      s=parseInt(sec);
      m=parseInt(min);
      h=parseInt(he);
      localStorage.removeItem('last_time');
  }
    // Format the output by adding 0 if it is single digit //
  let h1 = h < 10 ? "0" + h : h;  
  let m1 = m < 10 ? "0" + m : m;  
  let s1 = s < 10 ? "0" + s : s; 
  str = h1 + ':' + m1 + ':' + s1;
  document.getElementById('last_time').innerHTML = str;
    // Calculate the stop watch // 
    if (s < 59) {
        s = s + 1;
    } else {
        s = 0;
        m = m + 1;
        if (m == 60) {
            m = 0;
            h = h + 1;
        } // end if  m ==60
    }// end if else s < 59
    // end of calculation for next display     
}
