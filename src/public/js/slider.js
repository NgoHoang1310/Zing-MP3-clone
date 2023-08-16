
let prev=document.querySelector(".slide_show_pre");
let next=document.querySelector(".slide_show_next");

function nextSong() {
    next.addEventListener("click",function(){
        let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.appendChild(imgs[0])
    
    })
}

function prevSong() {
    prev.addEventListener("click",function(){
        let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.prepend(imgs[imgs.length-1])
    
    })
}

nextSong();
prevSong();

setInterval(function() {
    let imgs=document.querySelectorAll(".slide_show__item");
        let slide=document.querySelector(".slide_show");
        slide.appendChild(imgs[0])
},3000);