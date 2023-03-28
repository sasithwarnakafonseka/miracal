// Declaring Variables
var slideIndex = 1;
showDivs(slideIndex);

// Create the navigation elements to the page
$(".w3-left").css("display", "block");
$(".w3-right").css("display", "block");
$(".dots").css("display", "block");

// When Left button arrow is clicked..
$( ".w3-left" ).click(function() {
  $( ".mySlides" ).fadeTo( "medium" , 1, function() {
    // Animation complete.
  });
  plusDivs(-1)
});

// When Right arrow is clicked..
$( ".w3-right" ).click(function() {
  $( ".mySlides" ).fadeTo( "medium" , 1, function() {
    // Animation complete.
  });
  plusDivs(1)
});

/* Set Interval for Slider */
setInterval(function(){
  $( ".mySlides" ).fadeTo( "slow", 1,  function() {
    // Animation complete
  });

     plusDivs(1);
  }, 10000);

  // Click Function
  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

function currentDiv(n) {
  showDivs(slideIndex = n);
  console.log('Test');
}

function showDivs(n) {
  let i;
  let x = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");

  if (n > x.length) {slideIndex = 1}

  if (n < 1) {slideIndex = x.length}

  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";

  }

  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace("w3-black", "");
  }
    x[slideIndex-1].style.display = "block";


  // x[slideIndex-1].style.display = "position: relative";

  dots[slideIndex-1].className += "w3-black";
}
