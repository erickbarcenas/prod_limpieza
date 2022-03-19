window.addEventListener('load', ()=>{
    console.log("init nosotros");
    let idx_imgs = 0;
    let time = 1000;

    let img_1 = 'static/imgs/nosotros/erick.jpg';

    let imgs = [img_1];

    const show_img = () => {
        document.nosotros_profile.src = imgs[idx_imgs];
    }
    show_img();

    // SET TEXT
    document.getElementsByClassName("nosotros_card_name")[0].innerHTML = "Erick Iván Bárcenas Martínez";

    document.getElementsByClassName("nosotros_card_description")[0].innerHTML = "Me especializo en el desarrollo web Full Stack con el fin de desarrollar productos y servicios que cumplan los objetivos del negocio y del usuario.";

    
})


