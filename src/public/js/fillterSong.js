const fillterByCountry = () => {
    let getFillterSong = $$('.new_release__btn');
    getFillterSong.forEach(function (button) {
        button.onclick = function (e) {
            let getID = button.id;
            $('.new_release__btn.new-release-active').classList.remove('new-release-active');
            button.classList.add('new-release-active');
            postURL(e,this.href);
            setTimeout(function () {
                navigateToPage('discoverPage.php?fillterId='+getID, ".container-content");
            }, 1000)
        }
    })
}

// fillterByCountry();