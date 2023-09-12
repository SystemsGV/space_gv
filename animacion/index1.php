<!DOCTYPE html>
<html>
<body>
 
<img id="myImage" src="https://images2.alphacoders.com/522/thumb-1920-522622.jpg" width="60" height="98">
 
<img id="myImage1" onclick="changeImage()" src="https://lagranjavilla.com/banner_socio2016.jpg" width="90" height="48">
 
<script>
 
function changeImage() {
    var image = document.getElementById('myImage');
    if (image.src.match("bulbon")) {
        image.src = "https://lagranjavilla.com/b2-off.jpg";
    } else {
        image.src = "https://lagranjavilla.com/b1-off.jpg";
    }
}
 
</script>
 
</body>
</html>