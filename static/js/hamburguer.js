/** ====================================
*  🔰 Index - Hamburguer
  ==================================== **/

  /*
  var userSelection = document.getElementsByClassName('burger-menu');

  for(var i_burger = 0; i_burger < userSelection.length; i_burger++) {
    ((idx) => {
      userSelection[idx].addEventListener("click", function() {
            var overlay = document.getElementsByClassName('menu');
            userSelection[idx].addEventListener('click',function(){
            
            this.classList.toggle("close");
            overlay[idx].classList.toggle("overlay");

        });
       })
    })(i_burger);
  }*/

  var burgerMenu = document.getElementById('burger-menu');
  var overlay = document.getElementById('menu');
  burgerMenu.addEventListener('click',function(){
    this.classList.toggle("close");
    overlay.classList.toggle("overlay");
  });