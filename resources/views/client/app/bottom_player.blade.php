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

<div id="app">
    <h1>Music Player</h1>
    <ul>
        @foreach($tracks as $track)
            <li>
                <a href="{{ route('tracks.show', $track->id) }}" onclick="playTrack('{{ $track->pm3_path }}')">
                    {{ $track->name }} - {{ $track->artist->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <audio id="audioPlayer" controls></audio>
</div>

<script>
    function playTrack(filePath) {
        const audioPlayer = document.getElementById('audioPlayer');
        audioPlayer.src = filePath;
        audioPlayer.play();
    }
</script>
