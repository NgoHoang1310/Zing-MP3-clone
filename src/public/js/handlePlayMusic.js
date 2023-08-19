var json = document.querySelector('meta[name="name"]').content;
var song = JSON.parse(json);
console.log(song);

var getMusicLists = $('.music-name-list');
var getMusicName = $('.player-music-name');
var getCdThumb = $('#music-media');
var getAudio = $('.audioSrc');
var getPlayBtn = $('.player-control__function.play');
var getPauseBtn = $('.player-control__function.pause');
var getInputRange = $('.player-control__range');
var getInputVolume = $('.input-range__volume');
var getNextBtn = $('.player-control__function.next');
var getPreviousBtn = $('.player-control__function.previous');
var getRandomBtn = $('.player-control__function.random');
var getReplayBtn = $('.player-control__function.replay')
var songDefaultIndex = 0;
var isRandom = false;
var isReplay = false;
var isDownLoad = false;
var isMute=false;
// var songRandomIndex = Math.floor(Math.random()*10);


const app = {
    renderSongPlayer: function() {
        getCdThumb.innerHTML = `
        <img src="${song[songDefaultIndex].image}" alt="" class="music-control__image ms-5">
        <div class="music-control__name flex-fill ms-5" >
          <h3>${song[songDefaultIndex].title}</h3>
          <span>
              <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].artist},</a>
              <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].album}</a>
          </span>
        </div>          <div class="music-control__interact fs-4">
        <i class="fa-solid fa-heart me-3"></i>
        <i class="fas fa-ellipsis-h"></i>
        </div>

        `
        getAudio.src = song[songDefaultIndex].file_path;
    },
   

    nextSong: function () {
        if (isRandom) {
            this.playRandom();
        }
        else {
            songDefaultIndex++;
            if (songDefaultIndex >= song.length-1) {
                songDefaultIndex = 0;
            }
            this.renderSongPlayer();
        }

    },

    prevSong: function () {
        if (isRandom) {
            this.playRandom();
        }
        else {
            songDefaultIndex--;
            if (songDefaultIndex < 0) {
                songDefaultIndex = song.length - 2;
            }
            this.renderSongPlayer();
        }
    },

    playRandom: function () {
        var randomSong;
        do {
            randomSong = Math.floor(Math.random() * song.length-1);
        } while (randomSong == songDefaultIndex);
        songDefaultIndex = randomSong;
        this.renderSongPlayer();
    },
    replaySong: function () {
        getAudio.play();
    },

    changeVolume: function() {
       getInputVolume.onchange = function() {
        getAudio.volume = getInputVolume.value;
        console.log(getInputVolume.value);
       }
    },
    handleEvents: function() {
        
        getNextBtn.onclick = function () {
            app.nextSong();
            getAudio.play();
        }

        getPreviousBtn.onclick = function (e) {
            app.prevSong();
            getAudio.play();
        }

        getPlayBtn.onclick = function() {
            getAudio.play();
        }

        getPauseBtn.onclick = function() {
            getAudio.pause();
        }

        getAudio.onended = function () {
            if (isReplay) {
                app.replaySong();
            } else {
                setTimeout(function () {
                    app.nextSong();
                    getAudio.play();
                }, 2000)
            }
        }

        getAudio.onplay = function() {
            getPauseBtn.classList.remove('disable');
            getPlayBtn.classList.add('disable');
            getAudio.ontimeupdate = function () {
                getInputRange.value = this.currentTime;
                getInputRange.max = this.duration;
            }
            getInputRange.onchange = function () {
                getAudio.currentTime = this.value;
            }
        }

        getAudio.onpause = function() {
            getPauseBtn.classList.add('disable');
            getPlayBtn.classList.remove('disable');
            getInputRange.onchange = function () {
                getAudio.currentTime = this.value;
            }
        }
        getRandomBtn.onclick = function () {
            if (this.classList.toggle('active')) {
                isRandom = true;
            } else {
                isRandom = false;
            }
        }
        getReplayBtn.onclick = function () {
            if (this.classList.toggle('active')) {
                isReplay = true;
            } else {
                isReplay = false;
            }
        }
    },

    run: function () {
        this.renderSongPlayer();
        // this.renderListSong();
        // this.handleSrollTop();
        this.handleEvents();
        this.changeVolume();

    }
}

app.run();


