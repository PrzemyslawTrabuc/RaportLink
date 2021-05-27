function logout(){
    if(sessionStorage && sessionStorage.getItem("currentRaport")){
       if (confirm("Jesteś pewny? Utracisz bezpowrotnie niedokończony raport")) {
          sessionStorage.clear();
          return true;
       }
       return false;
     }
     return true; 
 }