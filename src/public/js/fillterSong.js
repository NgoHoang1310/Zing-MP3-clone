const fillterByCountry = (id, element,page) => {
    if ($('.new_release__btn.new-release-active')) {
        $('.new_release__btn.new-release-active').classList.remove('new-release-active');
    }
    element.classList.add('new-release-active');
    console.log(element.href);
    postURL(event, element.href);
    navigateToPage(page+'?country=' +id, ".container-content");

}

// fillterByCountry();