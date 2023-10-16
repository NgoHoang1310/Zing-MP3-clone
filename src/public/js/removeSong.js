const removeFromLib = (element) => {
  let getID;
  let getUserId = localStorage.getItem("userId");
  getID = element.closest(".new_release__song").id;
  //ajax
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/removeFromDB.php?libraryRemoveId=" + getID + "&" + "userId=" + getUserId, true);
  xhttp.send();
  setTimeout(function () {
    navigateToPage('librarySongPage.php', ".container-content");
  }, 1000);
  // console.log(getID+' '+getUserId);
}

const removeFromPlaylist = (element) => {
  let getID, playlistId;
  getID = element.closest(".new_release__song").id;
  playlistId = element.closest(".new_release__song").getAttribute('playlistId');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/removeFromDB.php?playlistSongRemoveId=" + getID + "&playlistId=" + playlistId, true);
  xhttp.send();
  setTimeout(function () {
    navigateToPage('playlistDetail.php?playlistId=' + playlistId, '.container-content');
  }, 1000);
}

const removeFromFavourite = (element) => {
  let getID;
  let getUserId = localStorage.getItem("userId");

  getID = element.closest(".new_release__song").id;
  //ajax
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/removeFromDB.php?favouriteRemoveSongId=" + getID + "&" + "userId=" + getUserId, true);
  xhttp.send();
  setTimeout(function () {
    navigateToPage('favouriteSongPage.php', ".container-content");
  }, 1000);

}
