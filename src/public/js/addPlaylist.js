let getPlaylistInput = $('#confirmAddPlaylist .playlist-title__input');
function handleInput(element, modal) {
    getCreateBtn = $('#' + modal + ' .btn-primary');
    if (!(element.value == '')) {
        getCreateBtn.removeAttribute('disabled');
    } else {
        getCreateBtn.setAttributeNode(document.createAttribute("disabled"));
    }
}

function addPlaylist() {
    let getUserId = localStorage.getItem("userId");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Đã chèn giá trị vào cơ sở dữ liệu.");
        }
    };
    xhttp.open("POST", "../controllers/addToDB.php?playlistAddTitle=" + getPlaylistInput.value + "&" + "userId=" + getUserId, true);
    xhttp.send();
    setTimeout(function () {
        navigateToPage('playlistPage.php', ".container-content");
    }, 100)
    // console.log(getPlaylistInput.value);
    // console.log(getUserId);
}
