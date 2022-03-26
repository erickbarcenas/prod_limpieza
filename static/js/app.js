
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