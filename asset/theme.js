setInterval(()=>{
// Stack Overflow
function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
  }
  let date=new Date();

  console.log( formatAMPM(date))
 



let days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; 
let todate= days[date.getDay()] + ' : ' + date.getDate() + ' : ' + date.getMonth() + ' : '+ date.getFullYear()+ ' | ' + formatAMPM(date);
 
 window.onload =  document.querySelector("#toptime").innerHTML= todate;

}, 1000);