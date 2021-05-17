const canvas = document.getElementById('img-edit-canvas');
const context = canvas.getContext("2d");
// var div = document.getElementById('rectSelect'), x1 = 0, y1 = 0, x2 = 0, y2 = 0;

window.addEventListener("load", () => {

    var color = "#000";
    var size = 5;
    var type = 0;
    var mousePos = {x:0, y:0};

    updateCanvasSize(window.innerHeight, window.innerWidth);

    context.strokeStyle = color;
    context.lineWidth = size;

    //variables
    let painting = false;

    function startPosition(e){
        painting = true;
        if(type == 0){
            context.lineCap = "round";
            draw(e);
        }
        if(type == 1){
            context.lineCap = "square";
            mousePos = getMousePos(e);
            // div.hidden = 0;
            // x1 = e.clientX;
            // y1 = e.clientY;
            // reCalc();
        }
    }

    function endPosition(e){
        if(type == 0){
            context.beginPath();
        }
        if(type == 1){
            drawRect(e);
            // div.hidden = 1;
        }
        painting = false;
    }

    function draw(e){
        if(!painting || type != 0){
            return;
        }

        let mouse = getMousePos(e);

        context.lineTo(mouse.x, mouse.y);
        context.stroke();
        context.beginPath();
        context.moveTo(mouse.x, mouse.y);
    }

    function drawRect(e){
        if(!painting || type != 1){
            return;
        }

        // x2 = e.clientX;
        // y2 = e.clientY;
        // reCalc();

        let mouse = getMousePos(e);
        let size = mouse;

        size.x = mouse.x - mousePos.x;
        size.y = mouse.y - mousePos.y;

        context.strokeRect(mousePos.x, mousePos.y, size.x, size.y);
    }

    function updateColor(){
        color = document.getElementById("pen-color").value;
        context.strokeStyle = color;
    }

    function updateSize(){
        size = document.getElementById("pen-size").value;
        document.getElementById("pen-size-val").innerHTML = size;
        
        context.lineWidth = size;
    }

    function updateType(e){
        type = e.target.value;
    }

    function clearCanvas(){
        context.clearRect(0, 0, canvas.width, canvas.height);
        loadImage();
    }

    // function getMousePos(e) {
    //     var rect = canvas.getBoundingClientRect();

    //     console.log(rect.left);
    //     console.log(e.clientX);

    //     return {
    //       x: e.clientX - rect.left,
    //       y: e.clientY - rect.top
    //     };
    // }

    function  getMousePos(e) {
        var rect = canvas.getBoundingClientRect(), // abs. size of element
            scaleX = canvas.width / rect.width,    // relationship bitmap vs. element for X
            scaleY = canvas.height / rect.height;  // relationship bitmap vs. element for Y
      
        return {
          x: (e.clientX - rect.left) * scaleX,   // scale mouse coordinates after they have
          y: (e.clientY - rect.top) * scaleY     // been adjusted to be relative to element
        }
      }

    function updateCanvasSize(x, y){
        canvas.height = x;
        canvas.width = y;
    };

    function loadImage()
    {
        let img = new Image();
        img.src = document.getElementById("imageResult").src;
        updateCanvasSize(img.height, img.width);
        img.onload = () => {
            context.drawImage(img, 0, 0);
            context.strokeStyle = color;
            context.lineWidth = size;
        }
        console.log(canvas);
    };

    function saveImage(){
        let img = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
        img.src = "newimage.png";
        document.getElementById("imageResult").src = img;
    }

    function reCalc() {
        var x3 = Math.min(x1,x2);
        var x4 = Math.max(x1,x2);
        var y3 = Math.min(y1,y2);
        var y4 = Math.max(y1,y2);
        div.style.left = x3 + 'px';
        div.style.top = y3 + 'px';
        div.style.width = x4 - x3 + 'px';
        div.style.height = y4 - y3 + 'px';
    }

    //eventListeners

    canvas.addEventListener('mousedown', startPosition);
    canvas.addEventListener('mouseup', endPosition);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseleave', endPosition);

    document.getElementById("pen-color").addEventListener('change', updateColor);
    document.getElementById("pen-size").addEventListener('change', updateSize);

    document.getElementById("pen").addEventListener('change', updateType);
    document.getElementById("rect").addEventListener('change', updateType);


    document.getElementById("reset-canvas").addEventListener('click', clearCanvas);
    document.getElementById("save-image").addEventListener('click', saveImage);
    document.getElementById("open-editor").addEventListener('click', loadImage);

});



function setCanvasPos(x, y){
    canvas.style.left = x;
    canvas.style.right = y;
    canvas.style.position = "absolute";
};