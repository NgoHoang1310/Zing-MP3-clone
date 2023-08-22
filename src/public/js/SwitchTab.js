
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const postURL = (e, target) => {
    e.preventDefault();
    window.history.pushState({}, "", target.href);
}

const handleSwitch = () => {
    let SwitchTabLeft = $$('.sideBar-primary__item:not(.separate)');
    SwitchTabLeft.forEach((tab) => {
        tab.onclick = (e) => {
            postURL(e, tab);
            $('.sideBar-primary__item.sideBar-active').classList.remove('sideBar-active');
            tab.classList.add('sideBar-active');
            switch ($('.sideBar-primary__item.sideBar-active').id) {
                case 'discoverTab':
                    navigateToPage('discoverPage.php', ".container-content");
                    break;
                case 'librarySongTab':
                        navigateToPage('librarySongPage.php', ".container-content");
                        break;
                case 'listenedTab':
                    navigateToPage('currentListenPage.php', ".container-content");
                    break;
                case 'favouriteTab':
                    navigateToPage('favouriteSongPage.php', ".container-content");
                    break;
                case 'playlistTab':
                    navigateToPage('playlistPage.php', ".container-content");
                    break;
                case 'albumTab':
                    navigateToPage('albumPage.php', ".container-content");
                    break;
                default:
                    navigateToPage('discoverPage.php    ', ".container-content");
                    break;
            }

        }
    })

}
handleSwitch();




