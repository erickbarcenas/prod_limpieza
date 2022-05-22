/** ====================================
*  🔰 Index - Carousel
  ==================================== **/

window.addEventListener('load', ()=>{
    // console.log("init carousel");
    let idx_imgs = 0;
    let time = 5000;

    let img_1 = 'https://cdn.discordapp.com/attachments/977886466904576000/977900277715861534/3.png';
    let img_2 = 'https://cdn.discordapp.com/attachments/977886466904576000/977900278688907274/2.png';
    let img_3 = 'https://cdn.discordapp.com/attachments/977886466904576000/977900278223368202/1.png';

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


