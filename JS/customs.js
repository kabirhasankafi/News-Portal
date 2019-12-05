function calender() {
	var NPdate = new Date();
	var	din = NPdate.getDay();
	var	mash = NPdate.getMonth();
    var tarikh = NPdate.getDate();
    var bochor = NPdate.getFullYear();
		  if(bochor < 1000){
            bochor +=1900
          }
    var  dinarray = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    var  masharray = new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        var mycalender = document.getElementById('NPdate');
        mycalender.textContent = "" +dinarray[din] + ", " +tarikh+" "+masharray[mash]+", "+bochor ;
        mycalender.innerText = "" +dinarray[din] + ", " +tarikh+" "+masharray[mash]+", "+bochor ; 
        
}
calender();













