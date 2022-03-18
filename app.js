
window.addEventListener('load', ()=>{
    let idx_imgs = 0;
    let time = 2000;

    let img_1 = '';
    let img_2 = '';
    let img_3 = '';
    let img_4 = '';

    let imgs = [img_1, img_2, img_3, img_4];

    const change_img = () => {
        document.slider.src = imgs[idx_imgs];
        if(idx_imgs < length(imgs)){
            idx_imgs++;
        }else{
            idx_imgs = 0;
        }
    }

    setInterval(change_img, time);
})