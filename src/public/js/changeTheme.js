const handleActiveModal = (element) => {
    let getTabTheme = $('.themeTab');
    let getModalTheme = $('.container_header--content_extend--modal');
    let getCloseModal = $('.container_header--content_extend--modal_title--icon');
    getTabTheme.onclick = function() {
        getModalTheme.classList.add('open');
    }
    getCloseModal.onclick = function() {
        getModalTheme.classList.remove('open');

    }
}
handleActiveModal();

const colors = $$('.container_header--content_extend--modal_themse_btn.change_color');

colors.forEach((item, index)=>{
    item.onclick = function (){
        if(index==0){
            $('.container-app').classList.remove('purple_color');
            $('.container-app').classList.remove('dark_color');
            $('.container-app').classList.remove('green_color');
            $('.container-app').classList.remove('red_color');
        }
        if(index==1){
            $('.container-app').classList.remove('purple_color');
            $('.container-app').classList.remove('green_color');
            $('.container-app').classList.remove('red_color');
            $('.container-app').classList.add('dark_color');
        }
        if(index==2){
            $('.container-app').classList.remove('dark_color');
            $('.container-app').classList.remove('green_color');
            $('.container-app').classList.remove('red_color');
            $('.container-app').classList.add('purple_color');
        }
        if(index==3){
            $('.container-app').classList.remove('purple_color');
            $('.container-app').classList.remove('dark_color');
            $('.container-app').classList.remove('red_color');
            $('.container-app').classList.add('green_color');
        }
        if(index==4){
            $('.container-app').classList.remove('purple_color');
            $('.container-app').classList.remove('dark_color');
            $('.container-app').classList.remove('green_color');
            $('.container-app').classList.add('red_color');
        }
        // out_in_user_color.click();
    }
})