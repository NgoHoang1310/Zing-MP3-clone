const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

let getSwitchTabs = $$('.sideBar-primary__item');
getSwitchTabs.forEach((tab)=>{
    tab.onclick = () => {
        $('.sideBar-primary__item.sideBar-active').classList.remove('sideBar-active');
        tab.classList.add('sideBar-active');
    }

})