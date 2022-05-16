/** ====================================
*  🔰 Index - Carousel
  ==================================== **/

window.addEventListener('load', ()=>{
    // console.log("init carousel");
    let idx_imgs = 0;
    let time = 5000;

    let img_1 = 'static/imgs/slider/slider-1.jpeg';
    let img_2 = 'static/imgs/slider/slider-2.jpeg';
    let img_3 = 'static/imgs/slider/slider-3.jpeg';

    let imgs = [img_1, img_2, img_3];

    const change_img = () => {
        document.slider.src = imgs[idx_imgs];
        if(idx_imgs < imgs.length-1){
            idx_imgs++;
        }else{
            idx_imgs = 0;
        }
    }

    setInterval(change_img, time);
})


/** ====================================
*  🔰 Index - Show Modal: products and whatsapp link
  ==================================== **/
  const targetDiv = document.getElementById("modal__index");
  const show_products = () => {
      if (targetDiv.style.display !== "none") {
          targetDiv.style.display = "none";
          scroll(0,0);
          localStorage.setItem('modal', JSON.stringify("hidden"));
      } else {
          targetDiv.style.display = "block";
      }
  }

window.addEventListener('load', ()=>{
    if(!localStorage.getItem('modal')) {
        targetDiv.style.display = "block";
    }else{
        targetDiv.style.display = "none"; 
    }
})


/** ====================================
*  🔰 Index - Input seach product
  ==================================== **/

  let cards = document.querySelectorAll('.card')
    
  function liveSearch() {
      let search_query = document.getElementById("searchbox").value;
      
      //Use innerText if all contents are visible
      //Use textContent for including hidden elements
      for (var i = 0; i < cards.length; i++) {
          if(cards[i].textContent.toLowerCase()
                  .includes(search_query.toLowerCase())) {
              cards[i].classList.remove("is-hidden");
          } else {
              cards[i].classList.add("is-hidden");
          }
      }
  }
  
  //A little delay
  let typingTimer;               
  let typeInterval = 500;  
  let searchInput = document.getElementById('searchbox');
  
  searchInput.addEventListener('keyup', () => {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(liveSearch, typeInterval);
  });

  /* */

  const seach_product = () => {
    /*console.log("searching...");*/
    clearTimeout(typingTimer);
    typingTimer = setTimeout(liveSearch, typeInterval);
  }

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


/** ====================================
*  🔰 Index - scroll
  ==================================== **/
  window.addEventListener("scroll", (event) => {
    let scrollY = this.scrollY;
    let scrollX = this.scrollX;
});

/** ====================================
*  🔰 Index - Anchor
  ==================================== **/

function go_to_anchor(anchor) {
    var loc = document.location.toString().split('#')[0];
    document.location = loc + '#' + anchor;
    

    var overlay = document.getElementById('menu');
    overlay.addEventListener('click',function(){
        overlay.classList.toggle("overlay");
    });
    return false;
}

/** ====================================
*  🔰 Index - Contact
  ==================================== **/

const contactButtons = document.querySelectorAll(".js-contactButton"),
    contactContents = document.querySelectorAll(".js-contactContent"),
    contactWrapper = document.querySelector(".js-contactWrapper");

    window.addEventListener("DOMContentLoaded", (()=>{
        contactButtons.forEach((t=>{
            t.addEventListener("click", (t=>{
                const o = t.target.dataset.name;
                contactButtons.forEach((o=>{
                    o.classList.remove("is-show"),
                    t.target.classList.add("is-show")
                }
                )),
                contactContents.forEach((t=>{
                    t.classList.remove("is-show"),
                    t.dataset.name == o && t.classList.add("is-show")
                }
                ))
            }
            ))
        }
        ))
    }
));
