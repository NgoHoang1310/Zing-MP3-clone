function goToDiscover(e,target) {
    e.preventDefault();
    window.history.pushState({}, "", target);
    navigateToPage('discoverPage.php', ".container-content");

    
}
