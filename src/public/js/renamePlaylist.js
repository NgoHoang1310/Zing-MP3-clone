let isRename = false;
let getRenameInput = $('#confirmRenamePlaylist .playlist-title__input');
const renamePlaylist = () => {
    isRename = true;
    if(isRename) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Đã chèn giá trị vào cơ sở dữ liệu.");
            }
        };
        xhttp.open("POST", "../controllers/addToDB.php?playlistRename=" + getRenameInput.value +"&"+"playlistId="+getID, true);
        xhttp.send();
        setTimeout(function () {
            navigateToPage('playlistPage.php', ".container-content");
        }, 1000)
        console.log(getID);
        console.log(getRenameInput.value)
    }
}