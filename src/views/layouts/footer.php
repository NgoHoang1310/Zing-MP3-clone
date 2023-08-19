<!-- 
</div>
<footer class="d-flex player-music-center pt-3 pb-3" >
        <div id="music-media" class=" col-4 d-flex text-white justify-content-around align-items-center">
          <img src="" alt="" class="music-control__image ms-5">
          <div class="music-control__name flex-fill ms-5" >
            <h3></h3>
            <span>
                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href="">,</a>
                <a style="text-decoration: none; color: #ccc; font-size: 12px; font-weight:500;" href=""></a>
            </span>
          </div>          <div class="music-control__interact fs-4">
          <i class="fa-solid fa-heart me-3"></i>
          <i class="fas fa-ellipsis-h"></i>
          </div>
        </div>

        <div class="col-4 pe-5 ps-5">
        <div class="player">
                <div class="player-control">
                    <span class="player-control__function replay btn-hover">
                        <i class="fa-solid fa-reply"></i>
                    </span>
                    <span class="player-control__function previous btn-hover">
                        <i class="fa-solid fa-backward"></i>
                      
                    </span>
                    <span class="player-control__function play">
                        <i class="fa-solid fa-play"></i>
                    </span>
                    <span class="player-control__function pause disable">
                        <i class="fa-solid fa-pause"></i>
                    </span>
                    <span class="player-control__function next btn-hover">
                        <i class="fa-solid fa-forward"></i>
                    </span>
                    <span class="player-control__function random btn-hover">
                        <i class="fa-solid fa-shuffle"></i>
                    </span>
                </div>
                <input type="range" value="0" step="1" min="0" max="1000" class="player-control__range">
               
                <audio src="<?php echo $row['file_path'];?>" class="audioSrc"></audio>            </div>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center" >
            <div class="music-control__adjust d-flex fs-4">
                <span class="music-control__adjust--volumn d-flex align-items-center pe-5" >
                    <i class="fa-solid fa-volume-high" style="color: #ffffff;"></i>
                    <input type="range" value="0" min="0" max= "100" class="input-range ms-3">
                </span>
                <span><i class="fa-solid fa-list ps-5 pt-3 pb-3 me-5" style="color: #ffffff; border-left:solid 1px #ccc;" ></i></span>
            </div>
        </div>
    </footer>

   </div>
</body> 

<script type="text/javascript"  src="../public/js/slider.js"></script>
<script type="text/javascript"  src="../public/js/SwitchTab.js"></script>
<script type="text/javascript"  src="../public/js/handlePlayMusic.js"></script>
<script type="text/javascript"  src="../routes/web.js"></script>
</html> -->
