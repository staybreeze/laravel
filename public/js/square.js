
   let mouseSquare = document.getElementsByClassName("mouse-square");
  let mouseSquareBig = document.getElementById("mouseSquareBig");
  let mouseSquareMidium = document.getElementById("mouseSquareMidium");
  let mouseSquareSmall = document.getElementById("mouseSquareSmall")
  let mouseSquareSmaller = document.getElementById("mouseSquareSmaller")
  let mouseSquareSmallest = document.getElementById("mouseSquareSmallest")
if(window.innerWidth>450){
  function updateCursor(e) {
    let x = e.clientX;
    let y = e.clientY;
    
    mouseSquareBig.style.left = x + 15 + "px";
    mouseSquareBig.style.top = y + 24 + "px";
    // mouseSquareBig.style.opacity=1;
    mouseSquareMidium.style.left = x + 15 + "px";
    mouseSquareMidium.style.top = y + 24 + "px";
    // mouseSquareMidium.style.opacity=1;
    mouseSquareSmall.style.left = x + 15 + "px";
    mouseSquareSmall.style.top = y + 24 + "px";
    // mouseSquareSmall.style.opacity=1;
    mouseSquareSmaller.style.left = x + 15 + "px";
    mouseSquareSmaller.style.top = y + 24 + "px";
    // mouseSquareSmaller.style.opacity=1;
    mouseSquareSmallest.style.left = x + 15 + "px";
    mouseSquareSmallest.style.top = y + 24 + "px";
    // mouseSquareSmallest.style.opacity=1;
    
  }

  window.addEventListener("mousemove", function(e) {
    requestAnimationFrame(() => updateCursor(e));

  });

  document.addEventListener("mousemove", function(event) {
 
  let x = event.clientX;
  let y = event.clientY;

  let elementUnderMouse = document.elementFromPoint(x, y);


  // if (elementUnderMouse.classList.contains("img-rotate")) {
    if(elementUnderMouse && elementUnderMouse.tagName === "IMG"){
    mouseSquareBig.style.opacity=0.2;
    mouseSquareBig.style.backgroundColor='purple';
    mouseSquareMidium.style.opacity=0.2;
    mouseSquareSmall.style.opacity=0.2;
    mouseSquareBig.style.backgroundColor='purple';
    mouseSquareMidium.style.backgroundColor='purple';
    mouseSquareSmall.style.backgroundColor='purple';
    mouseSquareSmaller.style.backgroundColor='purple';
    mouseSquareSmaller.style.opacity=0.2;
    mouseSquareSmallest.style.backgroundColor='purple';
    mouseSquareSmallest.style.opacity=0.2;

 
  } else {
    mouseSquareBig.style.opacity=1;
    mouseSquareMidium.style.opacity=1;
    mouseSquareSmall.style.opacity=1;
    mouseSquareSmaller.style.opacity=1;
    mouseSquareSmallest.style.opacity=1;
    mouseSquareBig.style.backgroundColor='rgb(253, 211, 104)';
    mouseSquareMidium.style.backgroundColor='rgb(253, 211, 104)';
    mouseSquareSmall.style.backgroundColor='rgb(253, 211, 104)';
    mouseSquareSmaller.style.backgroundColor='rgb(253, 211, 104)';
    mouseSquareSmallest.style.backgroundColor='rgb(253, 211, 104)';
    
  }

});}
