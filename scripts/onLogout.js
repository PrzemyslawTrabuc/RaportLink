function logout(){
    if(sessionStorage && sessionStorage.getItem("raport")){
       if (confirm("Jesteś pewny? Utracisz bezpowrotnie niedokończony raport")) {
          sessionStorage.removeItem("raport");
          return true;
       }
       return false;
     }
     return true; 
 }