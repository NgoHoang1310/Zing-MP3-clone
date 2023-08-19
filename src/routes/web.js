function navigateToPage(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".container-content").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", page, true);
    xhttp.send();
  }
   console.log(document.querySelector('.container-content'));
  // document.querySelector('.sideBar-primary__item.sideBar-active').onclick = function() {
  //   navigateToPage('discoverPageAll.php');
  // }