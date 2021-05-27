$(document).ready(function addEvent() {      
  $("button[name='add_event']").click(function addEvent() {
   var text = document.getElementById("event").value;
   var time = document.getElementById("time").value;
   if(time != "" && text !="")
   {
      var time_stamp = new Date();
      var date = time_stamp.getFullYear()+'-'+(time_stamp.getMonth()+1)+'-'+time_stamp.getDate()+' '+time_stamp.getHours()+':'+time_stamp.getMinutes()+':'+time_stamp.getSeconds();
      var domElement = $('<div class="event"><h3><i class="far fa-clock"></i> '+time+'</h3><br><p>'+text+'<p class="time_stamp">'+date+'<button type="button" name="delete_event" id="del_btn" class="btn btn-danger" onclick="removeElement(this)"><i class="fas fa-trash fa-lg"></i></button></p></div>');    
      $("div[id='Raport_footer']").before(domElement);        
      document.getElementById("time").value="";
      document.getElementById("event").value="";
      document.getElementById('alert').style.display = 'none';  
      var raportHTML = document.getElementById("Raport");
      var raport = JSON.stringify(raportHTML.innerHTML);
      sessionStorage.setItem('raport', raport);
   }else
   {
    document.getElementById('alert').style.display = 'block';
    window.scrollTo(0,0);
   }
  });
 });

 window.addEventListener("load", () => {
   function newRaport(){
      if(sessionStorage && sessionStorage.getItem("raport")){
         if (confirm("Jesteś pewny? Utracisz bezpowrotnie niedokończony raport")) {
            sessionStorage.removeItem("raport");
            window.location.reload();
            return true;
         }
         return false;
      }
      return true;
   } 
   document.getElementById("new_raport").addEventListener('click', newRaport);
 });
//  window.onbeforeunload = function (e) {
//    sessionStorage.removeItem("raport");
//  };