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
    document.getElementsByClassName("nosotros_card_name")[0].innerHTML = "Erick Iván Bárcenas Martínez, 23 años";

    document.getElementsByClassName("nosotros_card_description")[0].innerHTML = "Mi objetivo es usar la plataforma que proporciona Elixir para el " +

    "desarrollo de soluciones: tolerante a fallas, concurrentes y de alta capacidad.<br/>" +

    "Creativo, trabajo bajo presión, innovador<br/>" +
    "¡Me siento preparado para asumir nuevos retos profesionales!";

    
})


