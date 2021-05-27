function removeElement(e){
    e.parentNode.parentNode.remove();
    var raportHTML = document.getElementById("Raport");
    var raport = JSON.stringify(raportHTML.innerHTML);
    sessionStorage.setItem('raport', raport);
  }