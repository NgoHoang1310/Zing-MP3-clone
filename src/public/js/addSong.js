
const addToLib = (element) => {
  let getID;
  let getUserId = localStorage.getItem("userId");
  getID = element.closest(".new_release__song").id;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/addToDB.php?libraryAddId=" + getID + "&" + "userId=" + getUserId, true);
  xhttp.send();
  // console.log(getUserId);
}

const addToPlaylist = (element) => {
  let getSongId = element.closest(".new_release__song").id;
  let getPlaylistId = element.id;
  let getUserId = localStorage.getItem("userId");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/addToDB.php?playlistSongAddId=" + getSongId + "&" + "playlistId=" + getPlaylistId + "&" + "userId=" + getUserId, true);
  xhttp.send();
  console.log(getSongId);
  console.log(getPlaylistId);
}

