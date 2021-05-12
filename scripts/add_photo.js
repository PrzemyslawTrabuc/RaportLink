$(document).ready(function addPhoto() {      
  $("button[name='add_photo']").click(function addPhoto() {
   var text_photo = document.getElementById("event_photo").value;
   var time_photo = document.getElementById("time_photo").value;  
   var img = document.getElementById("imageResult").src; 
   console.log(img); 
   if(time_photo != "" && text_photo !="" && img.includes("/Agile/RaportLink/raport_building.php#") != true)
   {    
      var domElement = $('<div class="event"><h3><i class="far fa-clock"></i> '+time_photo+'</h3><br>'+text_photo+'</div><div class="raport_img"><img src='+img+'><br></div><hr>');           
      $("div[id='Raport_footer']").before(domElement);        
      document.getElementById("time_photo").value="";
      document.getElementById("event_photo").value="";    
      var img = document.getElementById("imageResult").src = "";
      document.getElementById('alert').style.display = 'none';
   }else
   {
    document.getElementById('alert').style.display = 'block';
    window.scrollTo(0,0);
   }

  });
 });