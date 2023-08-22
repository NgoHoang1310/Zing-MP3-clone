
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