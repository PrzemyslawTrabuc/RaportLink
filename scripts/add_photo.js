$(document).ready(function addPhoto() {      
  $("button[name='add_photo']").click(function addPhoto() {
   var text_photo = document.getElementById("event_photo").value;
   var time_photo = document.getElementById("time_photo").value;
      var domElement = $('<div class="event"><h4><i class="far fa-clock"></i> '+time_photo+'</h4><br>'+text_photo+'</div><hr>');           
      $("div[id='Raport_footer']").before(domElement);        
      document.getElementById("time_photo").value="";
      document.getElementById("event_photo").value="";
  });
 });