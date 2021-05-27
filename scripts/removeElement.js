function removeElement(e){   
  if(e.parentNode.parentNode.classList.contains('raport_img'))
  {
    e.parentNode.parentNode.parentNode.remove();    
  }else
  e.parentNode.parentNode.remove();  
    var raportHTML = document.getElementById("Raport");
    var raport = JSON.stringify(raportHTML.innerHTML);
    sessionStorage.setItem(sessionStorage.getItem("currentRaport"), raport);
  }