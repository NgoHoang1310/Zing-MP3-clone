
let prev=document.querySelector(".slide_show_pre");
let next=document.querySelector(".slide_show_next");

function nextSong() {
    next.onclick = function(){
        let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.appendChild(imgs[0])
    
    }
}

function prevSong() {
    prev.onclick = function(){
        let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.prepend(imgs[imgs.length-1])
    
    }
}

nextSong();
prevSong();

setInterval(function() {
    let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.appendChild(imgs[0])
},3000);

function toast(message) {
    // const toastTrigger = document.getElementByIdr('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast');
    console.log(toastLiveExample);
    console.log(message);
    document.querySelector('.toast-body').innerText = message;
    // console.log(toastTrigger);
    
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
      toastBootstrap.show();
}
