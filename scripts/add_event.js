$(document).ready(function addEvent() {      
  $("button[name='add_event']").click(function addEvent() {
   var text = document.getElementById("event").value;
   var time = document.getElementById("time").value;
   if(time != "" && text !="")
   {
      var domElement = $('<div class="event"><h3><i class="far fa-clock"></i> '+time+'</h3><br>'+text+'</div><hr>');           
      $("div[id='Raport_footer']").before(domElement);        
      document.getElementById("time").value="";
      document.getElementById("event").value="";
      document.getElementById('alert').style.display = 'none';     
   }else
   {
    document.getElementById('alert').style.display = 'block';
    window.scrollTo(0,0);
   }
  });
 });