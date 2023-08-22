let song;
const getDataSong = async (callback) => {
    await fetch('../model/querySongs.php')
        .then(function (response) {
            return response.json();
        })
        .then(callback)
        .catch(function (error) {
            console.log('Đã xảy ra lỗi: ' + error);
        });
}
const PLAYER_STORAGE_KEY = 'music-player';
let getMusicListDiscover = $('.row.new_release__list');
let getMusicListAll = $('.row.new_release__list');
let getMusicName = $('.player-music-name');
let getCdThumb = $('#music-media');
let getAudio = $('.audioSrc');
let getPlayBtn = $('.player-control__function.play');
let getPauseBtn = $('.player-control__function.pause');
let getInputRange = $('.player-control__range');
let getInputVolume = $('.input-range__volume');
let getNextBtn = $('.player-control__function.next');
let getPreviousBtn = $('.player-control__function.previous');
let getRandomBtn = $('.player-control__function.random');
let getReplayBtn = $('.player-control__function.replay')
let songDefaultIndex = 0;
let isRandom = false;
let isReplay = false;
let isDownLoad = false;
let isMute = false;

const controllerMusic = {

    getSongController: function () {
        getDataSong(function (song) {



            // var songRandomIndex = Math.floor(Math.random()*10);


            const app = {
                config: JSON.parse(localStorage.getItem(PLAYER_STORAGE_KEY)) || {},
                setConfig: function (key, value) {
                    this.config[key] = value;
                    localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(this.config))
                },
                renderSongPlayer: function () {
                    getCdThumb.innerHTML = `
                   <img src="${song[songDefaultIndex].image}" alt="" class="music-control__image ms-5">
                   <div class="music-control__name flex-fill ms-5" >
                     <h3>${song[songDefaultIndex].title}</h3>
                     <span>
                         <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].artist},</a>
                         <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].album}</a>
                     </span>
                   </div>
                             <div class="music-control__interact fs-4">
                   <i class="fa-solid fa-heart me-3"></i>
                   <i class="fas fa-ellipsis-h"></i>
                   </div>
           
                   `
                    getAudio.src = song[songDefaultIndex].file_path;
                },

                loadConfig: function () {
                    isRandom = this.config.isRandom;
                    isReplay = this.config.isReplay;
                },

                nextSong: function () {
                    if (isRandom) {
                        this.playRandom();
                    }
                    else {
                        songDefaultIndex++;
                        if (songDefaultIndex >= song.length - 1) {
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
                        randomSong = Math.floor(Math.random() * song.length - 1);
                    } while (randomSong == songDefaultIndex);
                    songDefaultIndex = randomSong;
                    this.renderSongPlayer();
                },
                replaySong: function () {
                    getAudio.play();
                },

                changeVolume: function () {
                    getInputVolume.onchange = function () {
                        getAudio.volume = getInputVolume.value;
                        console.log(getInputVolume.value);
                    }
                },

                handleEvents: function () {

                    getNextBtn.onclick = function () {
                        app.nextSong();
                        getAudio.play();
                    }

                    getPreviousBtn.onclick = function (e) {
                        app.prevSong();
                        getAudio.play();
                    }

                    getPlayBtn.onclick = function () {
                        getAudio.play();
                    }

                    getPauseBtn.onclick = function () {
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

                    getAudio.onplay = function () {
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

                    getAudio.onpause = function () {
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
                        app.setConfig('isRandom', isRandom);

                    }
                    getReplayBtn.onclick = function () {
                        if (this.classList.toggle('active')) {
                            isReplay = true;
                        } else {
                            isReplay = false;
                        }
                        app.setConfig('isReplay', isReplay);
                    }
                },

                run: function () {
                    this.loadConfig();
                    this.renderSongPlayer();
                    // this.renderListSong();
                    // this.handleSrollTop();
                    this.handleEvents();
                    this.changeVolume();
                    getRandomBtn.classList.toggle('active', isRandom);
                    getReplayBtn.classList.toggle('active', isReplay);
                }
            }

            app.run();

        })
    },
    clickOnSong: function (id,songActive) {
       
        getDataSong(function (data) {
                let song = data;
                songDefaultIndex = id-1;
                getCdThumb.innerHTML = `
                <img src="${song[songDefaultIndex].image}" alt="" class="music-control__image ms-5">
                <div class="music-control__name flex-fill ms-5" >
                  <h3>${song[songDefaultIndex].title}</h3>
                  <span>
                      <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].artist},</a>
                      <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">${song[songDefaultIndex].album}</a>
                  </span>
                </div>
                          <div class="music-control__interact fs-4">
                <i class="fa-solid fa-heart me-3"></i>
                <i class="fas fa-ellipsis-h"></i>
                </div>
        
                `
                 getAudio.src = song[songDefaultIndex].file_path;
                 getAudio.play();
        })
        console.log(id)
    }

}

controllerMusic.getSongController();








