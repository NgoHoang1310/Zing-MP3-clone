const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
// console.log($('.main-content'));
//leftSideBar
let SwitchTabLeft = $$('.sideBar-primary__item:not(.separate)');
SwitchTabLeft.forEach((tab)=>{
    tab.onclick = (e) => {
        $('.sideBar-primary__item.sideBar-active').classList.remove('sideBar-active');
        tab.classList.add('sideBar-active');

    }

})

//library-top

let SwitchTabTop = $$('.library-nav .nav-link');
SwitchTabTop.forEach((tab) => {
    tab.onclick = () => {
        $('.library-nav .nav-link.active').classList.remove('active');
        tab.classList.add('active');
    }
})
