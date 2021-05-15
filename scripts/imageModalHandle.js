function resetModal(){
    document.getElementById('open-editor').hidden = 1;
  };

  $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 700) {
    $('.buttons_side').fadeIn();
  } else {
    $('.buttons_side').fadeOut();
  }
});
/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
  if(input)
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);                                
        };
       reader.readAsDataURL(input.files[0]);   

       document.getElementById( 'open-editor' ).hidden = 0;
    }
}

$(function () {
  if(input != null){
    $('#upload').on('change', function () {
        readURL(input);             
    });
  }
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label');

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}