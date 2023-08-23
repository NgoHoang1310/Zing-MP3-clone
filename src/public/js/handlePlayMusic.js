let song;

//call api từ file querySongs.php
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
//khai báo các biến cần sử dụng
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

// tạo một đối tượng chứa các phương thức xử lí trình chơi nhạc
const controllerMusic = {
    // xử lí phần chơi nhạc footer
    getSongController: function () {
        getDataSong(function (song) {
            const app = {
                //hàm lưu trữ các config trên localstorage
                config: JSON.parse(localStorage.getItem(PLAYER_STORAGE_KEY)) || {},
                setConfig: function (key, value) {
                    this.config[key] = value;
                    localStorage.setItem(PLAYER_STORAGE_KEY, JSON.stringify(this.config))
                },
                //hàm render ra bài hát phần footer
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
                // hàm next bài
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
                        app.autoActiveSong();

                    }

                },
                //hàm prev bài
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
                        app.autoActiveSong();

                    }
                },
                //hàm play random
                playRandom: function () {
                    var randomSong;
                    do {
                        randomSong = Math.floor(Math.random() * song.length - 1);
                    } while (randomSong == songDefaultIndex);
                    songDefaultIndex = randomSong;
                    this.renderSongPlayer();
                    app.autoActiveSong();

                },
                //hàm phát lại
                replaySong: function () {
                    getAudio.play();
                },
                //hàm tăng giảm âm lượng
                changeVolume: function () {
                    getInputVolume.onchange = function () {
                        getAudio.volume = getInputVolume.value;
                        console.log(getInputVolume.value);
                    }
                },
                //hàm tự động active song khi nhấn prev hoặc next
                autoActiveSong: function () {
                    let getNewReleaseSong = $$('.col-4.new_release__song');
                    if (songDefaultIndex < getNewReleaseSong.length) {
                        getNewReleaseSong.forEach((song) => {
                            if ((parseInt(song.id) - 1 == parseInt(songDefaultIndex))) {
                                if ($('.col-4.new_release__song.songActive')) {
                                    $('.col-4.new_release__song.songActive').classList.remove('songActive');
                                    song.classList.add('songActive');
                                } else {
                                    song.classList.add('songActive');
                                }
                                console.log(song.id)
                            }
                        })
                    } else {
                        if ($('.col-4.new_release__song.songActive')) {
                            $('.col-4.new_release__song.songActive').classList.remove('songActive');
                        }
                    }


                },
                //hàm xử lí các sự kiện
                handleEvents: function () {
                    //xử lí khi nhấn next
                    getNextBtn.onclick = function () {
                        app.nextSong();
                        getAudio.play();
                    }
                    //xử lí khi nhấn prev
                    getPreviousBtn.onclick = function (e) {
                        app.prevSong();
                        getAudio.play();
                    }
                    //xử lí khi nhấn play
                    getPlayBtn.onclick = function () {
                        getAudio.play();
                    }
                    //xử lí khi nhấn pause
                    getPauseBtn.onclick = function () {
                        getAudio.pause();
                    }
                    //xử lí khi bài hát kết thúc
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
                    //xử lí khi bài hát đang chạy
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
                    //xử lí khi bài hát đang dừng
                    getAudio.onpause = function () {
                        getPauseBtn.classList.add('disable');
                        getPlayBtn.classList.remove('disable');
                        getInputRange.onchange = function () {
                            getAudio.currentTime = this.value;
                        }
                    }
                    //xử lí khi nhấn nút random
                    getRandomBtn.onclick = function () {
                        if (this.classList.toggle('active')) {
                            isRandom = true;
                        } else {
                            isRandom = false;
                        }
                        app.setConfig('isRandom', isRandom);

                    }
                    //xử lí khi nhấn nút replay
                    getReplayBtn.onclick = function () {
                        if (this.classList.toggle('active')) {
                            isReplay = true;
                        } else {
                            isReplay = false;
                        }
                        app.setConfig('isReplay', isReplay);
                    }
                },
                //hàm khởi chạy tất cả các phương thức của trình phát nhạc
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
    //hàm xử lí khi nhấn trực tiếp vào bài hát
    clickOnSong: function (id, songActive) {

        if ($('.col-4.new_release__song.songActive')) {
            $('.col-4.new_release__song.songActive').classList.remove('songActive');
            songActive.classList.add('songActive');

        } else {
            songActive.classList.add('songActive');
        }
        getDataSong(function (data) {
            let song = data;
            songDefaultIndex = id - 1;
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
    },



}

controllerMusic.getSongController();









