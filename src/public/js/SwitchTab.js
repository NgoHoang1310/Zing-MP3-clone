
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const postURL = (e, target) => {
    e.preventDefault();
    window.history.pushState({}, "", target.href || target);
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
                case 'chartTab':
                    navigateToPage('chartPage.php', ".container-content");
                    setTimeout(chartLine, 200);
                    break;
                case 'librarySongTab':
                    navigateToPage('librarySongPage.php', ".container-content");
                    break;
                case 'listenedTab':
                    navigateToPage('currentListenPage.php', ".container-content");
                    break;
                case 'playlistTab':
                    navigateToPage('playlistPage.php', ".container-content");
                    break;
                case 'favouriteTab':
                    navigateToPage('favouriteSongPage.php', ".container-content");
                    break;
                default:
                    navigateToPage('discoverPage.php', ".container-content");
                    break;
            }

        }
    })


}
handleSwitch();

const navigateToAll = (e, target) => {
    postURL(e, target);
    navigateToPage('discoverPageAll.php', '.container-content');
}

const navigateToPlaylistDetail = (e, target, element) => {
    postURL(e, target);
    let getPlaylistId = element.closest('.playlist-list').id;
    setTimeout(function () {
        navigateToPage('playlistDetail.php?playlistId=' + getPlaylistId, '.container-content');
    }, 1000)
    console.log(getPlaylistId);
}




