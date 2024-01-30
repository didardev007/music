{{--<div class="container-xl player fixed-bottom">
    <div class="track_name">

    </div>
    <div class="row">
        <div class="col-4">
            <img class="img_src">
        </div>
        <audio class="audio"></audio>
        <div class="col-4">
            <div class="row row-cols-3">
                <div class="col">
                    <button class="prev bi bi-skip-backward-btn-fill"></button>
                    <button class="play btn_src bi bi-play"></button>
                    <button class="next bi bi-skip-forward-btn-fill"></button>
                </div>
            </div>
        </div>
        <div class="col progress_container">
            <div class="progress">

            </div>
        </div>
    </div>
</div>--}}

{{--<div id="app">--}}
    {{--<h1>Music Player</h1>--}}
    {{--<ul>--}}
        {{--@foreach($tracks as $track)--}}
            {{--<li>--}}
                {{--<a href="{{ route('tracks.show', $track->id) }}" onclick="playTrack('{{ $track->pm3_path }}')">--}}
                    {{--{{ $track->name }} - {{ $track->artist->name }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--<audio id="audioPlayer" controls></audio>--}}
{{--</div>--}}

{{--<script>--}}
    {{--function playTrack(filePath) {--}}
        {{--const audioPlayer = document.getElementById('audioPlayer');--}}
        {{--audioPlayer.src = filePath;--}}
        {{--audioPlayer.play();--}}
    {{--}--}}
{{--</script>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-6 offset-md-3">--}}
            {{--<h1>Track player</h1>--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<audio src="" id="audio" controls></audio>--}}
                    {{--<div class="progress">--}}
                        {{--<div class="progress-bar" id="progress-bar" role="progressbar"--}}
                             {{--style="width: 0%;" aria-valuenow="0"--}}
                             {{--aria-valuemin="0" aria-valuemax="100">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group" role="group" aria-label="Controls">--}}
                        {{--<button id="prev-btn" type="button" class="btn btn-secondary">--}}
                            {{--<i class="bi bi-skip-backward"></i>--}}
                        {{--</button>--}}
                        {{--<button id="play-btn" type="button" class="btn btn-primary">--}}
                            {{--<i class="bi bi-play"></i>--}}
                        {{--</button>--}}
                        {{--<button id="pause-btn" type="button" class="btn btn-primary">--}}
                            {{--<i class="bi bi-pause"></i>--}}
                        {{--</button>--}}
                        {{--<button id="stop-btn" type="button" class="btn btn-secondary">--}}
                            {{--<i class="bi bi-stop"></i>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div id="track-info" class="mt-3">--}}
                        {{--<p id="track-title">No track</p>--}}
                        {{--<p id="track-artist"></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
    {{--<script>--}}
        {{--var audio = $("#audio")[0];--}}
        {{--var tracks = [];--}}
        {{--var index = 0;--}}

        {{--function formatDuration(seconds){--}}
            {{--var minutes = Math.floor(seconds / 60);--}}
            {{--var seconds = Math.round(seconds % 60);--}}
            {{--if (seconds < 10) {--}}
                {{--seconds = "0" + seconds;--}}
            {{--}--}}
            {{--return minutes + ":" + seconds;--}}
        {{--}--}}

        {{--function updateUI() {--}}
            {{--var currentTime = audio.currentTime;--}}
            {{--var duration = audio.duration;--}}

            {{--var percentage = (currentTime / duration) * 100;--}}

            {{--$("#progress-bar").css("width", percentage + "%");--}}
            {{--$("#progress-bar").attr("aria-valuenow", percentage);--}}

            {{--$("#track-title").text(tracks[index]);--}}
            {{--$("#track-artist").text("Unknown artist");--}}

            {{--$("#track-info").append("<p id='track-duration'>" + formatDuration(duration) + "</p>");--}}
        {{--}--}}

        {{--function loadTrack(index) {--}}
            {{--var track = track[index];--}}

            {{--audio.src = "{{asset('storage/track/')}}" + track;--}}

            {{--audio.play();--}}

            {{--updateUI();--}}
        {{--}--}}

        {{--function nextTrack() {--}}
            {{--index++;--}}

            {{--if (index >= tracks.length){--}}
                {{--index = 0;--}}
            {{--}--}}

            {{--loadTrack(index);--}}
        {{--}--}}

        {{--function prevTrack() {--}}
            {{--index--;--}}

            {{--if(index < 0){--}}
                {{--index = tracks.length - 1;--}}
            {{--}--}}

            {{--loadTrack(index);--}}
        {{--}--}}

        {{--function stopAudio() {--}}
            {{--audio.pause();--}}
            {{--audio.currentTime = 0;--}}
            {{--updateUI();--}}
        {{--}--}}

        {{--function browseDirectory() {--}}
            {{--$.ajax({--}}
                {{--url:"{{asset('storage/track/')}}",--}}
                {{--success: function (data) {--}}
                    {{--$(data).find("a:contains(.mp3), a:contains(.wav), a:contains(.ogg)").each(function () {--}}
                        {{--var track = $(this).attr("href");--}}
                        {{--track.push(track);--}}
                    {{--});--}}
                    {{--loadTrack(0);--}}
                {{--},--}}
            {{--});--}}
        {{--}--}}

        {{--$(document).ready(function () {--}}
            {{--browseDirectory();--}}
            {{--$("#play-btn").click(function () {--}}
                {{--audio.play();--}}
            {{--});--}}
            {{--$("#pause-btn").click(function () {--}}
                {{--audio.pause();--}}
            {{--});--}}
            {{--$("#stop-btn").click(function () {--}}
                {{--stopAudio();--}}
            {{--});--}}
            {{--$("#next-btn").click(function () {--}}
                {{--nextTrack();--}}
            {{--});--}}
            {{--$("#prev-btn").click(function () {--}}
                {{--prevTrack();--}}
            {{--});--}}

            {{--audio.addEventListener("time update" , function () {--}}
                {{--updateUI();--}}
            {{--});--}}

        {{--});--}}


{{--</script>--}}
