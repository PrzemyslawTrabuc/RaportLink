$(document).ready(function addEvent() {      
  $("button[name='add_event']").click(function addEvent() {
   var text = document.getElementById("event").value;
   var time = document.getElementById("time").value;
   if(time != "" && text !="")
   {
      var time_stamp = new Date();
      var date = time_stamp.getFullYear()+'-'+(time_stamp.getMonth()+1)+'-'+time_stamp.getDate()+' '+time_stamp.getHours()+':'+time_stamp.getMinutes()+':'+time_stamp.getSeconds();
      var domElement = $('<div class="event"><h3><i class="far fa-clock"></i> '+time+'</h3><br><p>'+text+'<p class="time_stamp">'+date+'</p></div><hr><br>');           
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