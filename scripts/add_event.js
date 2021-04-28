$(document).ready(function addEvent() {      
  $("button[name='add_event']").click(function addEvent() {
   var text = document.getElementById("event").value;
   var time = document.getElementById("time").value;
      var domElement = $('<div class="event"><h4><i class="far fa-clock"></i> '+time+'</h4><br>'+text+'</div><hr>');           
      $("div[id='Raport_footer']").before(domElement);        
      document.getElementById("time").value="";
      document.getElementById("event").value="";
  });
 });