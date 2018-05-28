<script>
var images = ["images/s1.png", "images/s2.png"];

var i = 1;
var max = images.length;

function changeImage(){ 
  document.getElementById("slider").src = images[i++];
  if(i==max){
    i=0;
  }
}

setInterval(function(){changeImage()}, 3000);

</script>

<p align="center"><img src="images/s1.png" class="img-responsive" width="100%" id="slider" align="center"></p>
