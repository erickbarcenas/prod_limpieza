/** ====================================
*  🔰 Index - Carousel
  ==================================== **/
/*
window.addEventListener('load', ()=>{
    console.log("init carousel");
    let idx_imgs = 0;
    let time = 1000;

    let img_1 = 'static/imgs/productos/cubrebocas1.jpg';
    let img_2 = 'static/imgs/productos/cubrebocas2.jpg';
    let img_3 = 'static/imgs/productos/cubrebocas3.jpg';

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
*/
/** ====================================
*  🔰 Index - Show Modal: products and whatsapp link
  ==================================== **/
const targetDiv = document.getElementById("modal__index");
const show_products = () => {
    if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
        scroll(0,0);
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