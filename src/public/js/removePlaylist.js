let isRemove = false;
let getID;
    const getPlaylistId= (element) => {
    return getID=element.closest('.playlist-list').id;
}

const confirmRemove = () => {
  isRemove = true;
  if(isRemove) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
      }
    };
    xhttp.open("POST", "../controllers/removeFromDB.php?playlistRemoveId=" + getID, true);
    xhttp.send();
    setTimeout(function(){
      navigateToPage('playlistPage.php', ".container-content");
    },1000);
  }
}