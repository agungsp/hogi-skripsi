<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <div class="row">
            <div class="col">
                <strong class="mx-5">Singkatan</strong>
            </div>
            <div class="col">
                <strong class="mx-5">Arti</strong>
            </div>
        </div>
    </li>
</ul>
<ul class="list-group list-group-flush">
    <form id="formSingkatanEditor" action="{{ route('singkatan.edit') }}" method="post">
        @csrf
        @forelse ($abbrs as $abbr)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-auto">
                        <input type="checkbox" name="isUses[]" id="isUses{{ $loop->iteration }}" onclick="toggleList({{ $loop->iteration }})" class="form-checkbox" checked>
                    </div>
                    <div class="col">
                        <input type="text" name="words[]" id="words{{ $loop->iteration }}" class="form-control" readonly value="{{ $abbr->word }}">
                    </div>
                    <div class="col">
                        <input type="text" name="means[]" id="means{{ $loop->iteration }}" class="form-control" autofocus autocomplete="off" value="{{ $abbr->mean }}">
                    </div>
                </div>
            </li>
        @empty
            <li class="list-group-item"></li>
        @endforelse
    </form>
</ul>
