/** ====================================
*  🔰 Index - Carousel
  ==================================== **/

window.addEventListener('load', ()=>{
    console.log("init carousel");
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
  }






  const headerButtonMenu = document.querySelector('.js-headerButtonMenu')
const header = document.querySelector('.js-header')

headerButtonMenu.addEventListener('click', () => header.classList.toggle('is-show'))

const headerButtonCart = document.querySelector('.js-headerButtonCart')
const cartCloseButton = document.querySelector('.js-cartCloseButton')
const headerCart = document.querySelector('.js-cart')

headerButtonCart.addEventListener('click', () => headerCart.classList.add('is-show'))
cartCloseButton.addEventListener('click', () => headerCart.classList.remove('is-show'))

let navItemsList = [{
        title: 'products',
        link: 'products',
        dropdownItems: [{
                title: 'sunglasses',
                link: 'sunglasses',
            },
            {
                title: 'trousers',
                link: 'trousers',
            },
            {
                title: 'necklace',
                link: 'necklace',
            }
        ]
    },
    {
        title: 'faq\'s',
        link: 'faqs'
    },
    {
        title: 'contact',
        link: 'contact',
        dropdownItems: [{
                title: 'reach us',
                link: 'reach-us'
            },

            {
                title: 'about us',
                link: 'about-us'
            },
            {
                title: 'find us',
                link: 'find-us'
            }
        ]
    }
]

class NavItem {
    constructor(title, link, dropdownItems) {
        this.title = title
        this.link = link
        this.dropdownItems = dropdownItems
    }

    toHTML() {
        let navItemHTML = `<div class="header__nav-wrapper js-headerNavWrapper"><div class="header__nav__item-wrapper">
            <a href="/#${this.link}" class="header__nav__item link js-headerNavItem" title="${this.title}">${this.title}</a>`

        if (this.dropdownItems) {
            navItemHTML += `<button class="header__nav__button js-headerNavButton" type="button">
                <svg class="icon icon-down">
                    <use xlink:href="#icon-down"></use>
                </svg>
            </button>`
        }
        navItemHTML += `</div>`

        if (this.dropdownItems) {
            navItemHTML += `<div class="header__nav__dropdown">`
            this.dropdownItems.forEach(dropdownItem => {
                navItemHTML += `<a class="header__nav__dropdown__item link js-headerNavDropdownItem" href="/#${dropdownItem.link}" title="${dropdownItem.title}">${dropdownItem.title}</a>`
            })
            navItemHTML += `</div>`
        }
        navItemHTML += `</div>`
        return navItemHTML
    }
}

navItemsList = navItemsList.map(navItem => {
    return new NavItem(navItem.title, navItem.link, navItem.dropdownItems)
})

window.addEventListener('DOMContentLoaded', () => navDOM.showNavItems(navItemsList))

class NavDOM {

    showNavItems(navItems) {
        let navItemsListHTML = navItems.map(navItem => {
                return navItem.toHTML()
            })
            .join('')

        const headerNav = document.querySelector('.js-headerNav')
        headerNav.innerHTML = navItemsListHTML
        this.navButtonClickEvents()
        this.scrollDropdownItems()
    }

    navButtonClickEvents() {
        const headerNavButtons = document.querySelectorAll('.js-headerNavButton')

        headerNavButtons.forEach(button => {
            button.addEventListener('click', () => {
                button.parentElement.parentElement.classList.toggle('is-show')

                headerNavButtons.forEach(item => {
                    if (item !== button) {
                        item.parentElement.parentElement.classList.remove('is-show')
                    }
                })
            })
        })
    }

    scrollDropdownItems() {
        const headerNavDropdownItems = document.querySelectorAll('.js-headerNavDropdownItem')

        headerNavDropdownItems.forEach(item => {
            item.addEventListener('click', (e => {
                e.preventDefault()

                const wrapper = document.getElementById(item.closest('.js-headerNavWrapper').querySelector('.js-headerNavItem').getAttribute('href').slice(2))
                if (!wrapper) {
                    return true
                }

                const itemName = item.getAttribute('href').slice(2)
                const selector = wrapper.querySelector(`[data-name="${ itemName }"]`)

                if (selector)
                    selector.dispatchEvent(new Event('click'))

                wrapper.scrollIntoView({
                    behavior: 'smooth'
                })
            }))
        })

        document.querySelectorAll('a[href="/#products"]').forEach(item => {
            item.addEventListener('click', (e => {
                document.querySelector('.js-productCategory[data-name="all"]').dispatchEvent(new Event('click'))
            }))
        })
    }
}

const navDOM = new NavDOM()