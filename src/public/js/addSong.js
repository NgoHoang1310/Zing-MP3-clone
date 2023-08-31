
const addToLib = (element) => {
  let getID;
  getID = element.closest(".new_release__song").id;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
      }
    };
    xhttp.open("POST", "../controllers/addToDB.php?libraryAddId=" + getID , true);
    xhttp.send();
  }

const addToPlaylist = (element) => {
  let getSongId = element.closest(".new_release__song").id;
  let getPlaylistId = element.id;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Đã chèn giá trị id vào cơ sở dữ liệu.");
    }
  };
  xhttp.open("POST", "../controllers/addToDB.php?playlistSongAddId=" + getSongId + "&" +"playlistId=" + getPlaylistId , true);
  xhttp.send();
  console.log(getSongId);
  console.log(getPlaylistId);
}

