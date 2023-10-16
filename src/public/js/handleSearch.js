function showHint(str) {
    if (str.length == 0) {
        document.querySelector(".song-search").innerText = "Tình yêu màu nắng";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                try {
                    document.querySelector(".song-search").innerText = JSON.parse(this.responseText).title;
                    document.querySelector(".song-search").id = JSON.parse(this.responseText).song_id;
                } catch (error) {
                    document.querySelector(".song-search").innerText = this.responseText;
                }
            }
        };
        xmlhttp.open("GET", "../model/search.php?s=" + str, true);
        xmlhttp.send();
    }
}

function showSearch() {
    let tabSearch = document.querySelector(".header__search-history");
    tabSearch.classList.toggle('show');
}
