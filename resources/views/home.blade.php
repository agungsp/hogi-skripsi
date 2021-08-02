@extends('layout')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- TITLE --}}
@section('title', 'Home')

{{-- CONTENT --}}
@section('content')
    <div class="row mt-3">
        <div class="col-6">
            <div class="row mb-3">
                <div class="col">
                    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if (\App\Models\FullTextClass::count() > 0) active @else disabled @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Data Uji
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if (\App\Models\FullTextClass::count() == 0) active @endif" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Data Training
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade @if (\App\Models\FullTextClass::count() > 0) show active @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form action="{{ route('home.inputText') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="dataUji">File Data Uji</label>
                                            <input class="form-control" type="file" name="dataUji" id="dataUji" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span id="dataUjiTimer" class="small" data-second="0">0 sec</span>
                                            <button class="btn btn-primary float-end" type="submit" id="submitDataUji" onclick="timer('dataUji')">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade @if (\App\Models\FullTextClass::count() == 0) show active @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card shadow">
                                <div class="card-body">
                                    <form action="{{ route('home.inputDataTraining') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="dataTraining">File Data Training</label>
                                            <input class="form-control" type="file" name="dataTraining" id="dataTraining" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span id="dataTrainingTimer" class="small" data-second="0">0 sec</span>
                                            <button class="btn btn-primary float-end" type="submit" id="submitDataTraining" onclick="timer('dataTraining')">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col container-groupname">
                    @forelse ($classifiedSummary as $key => $values)
                        <div class="card shadow mb-2">
                            <div class="card-body row">
                                <div class="col">
                                    {{ $key }}
                                </div>
                                @foreach ($values->sortByDesc('class') as $value)
                                    <div class="col text-end">
                                        <span class="d-block small">
                                            {{ ucwords($value->class) }}
                                        </span>
                                        <span class="d-block fs-2">
                                            {{ $value->count }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <p class="text-center mt-4">
                            Data not found!
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-6 container-result">
            <h3>Result</h3>
            <div class="card mb-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="small mb-2">
                                Start
                            </div>
                            <input type="date" name="dateStart" id="dateStart"
                                   class="form-control" value="{{ now()->day(1)->toDateString() }}"
                                   max="{{ now()->toDateString() }}">
                        </div>
                        <div class="col">
                            <div class="small mb-2">
                                End
                            </div>
                            <input type="date" name="dateEnd" id="dateEnd"
                                   class="form-control" value="{{ now()->toDateString() }}"
                                   min="{{ now()->day(1)->toDateString() }}">
                        </div>
                        <div class="col">
                            <div class="small mb-2">
                                Order By
                            </div>
                            <select class="form-select" name="order" id="order">
                                <option value="asc">Asc</option>
                                <option value="desc" selected>Desc</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="classifiedWords"></div>
            <div id="loading" class="row justify-content-center d-none">
                <div class="col-auto">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div id="btnMore" class="d-grid gap-2 mb-3 d-none">
                <button class="btn btn-primary btn-block">
                    More..
                </button>
            </div>
        </div>
    </div>
@endsection

{{-- MODAL --}}
@section('modal')

@endsection

{{-- JS --}}
@section('js')
    <script>
        /*
         +------------------------------------------------
         | Variable Section
         +------------------------------------------------
        */
        let lastId, hasNext, showed;
        let loading;
        let classifiedWords,
            dateStart,
            dateEnd,
            order,
            btnMore,
            dataTrainingTimer,
            submitDataTraining,
            dataUjiTimer,
            submitDataUji;
        /*
         +------------------------------------------------
         | End Variable Section
         +------------------------------------------------
        */

        /*
         +------------------------------------------------
         | Init Function Section
         +------------------------------------------------
        */
        function initComponents() {
            lastId = 0;
            hasNext = false;
            showed = 0;

            loading = $('#loading');

            classifiedWords = $('#classifiedWords');
            dateStart = $('#dateStart');
            dateEnd = $('#dateEnd');
            order = $('#order');
            btnMore = $('#btnMore');
            dataTrainingTimer = $('#dataTrainingTimer');
            submitDataTraining = $('#submitDataTraining');
            dataUjiTimer = $('#dataUjiTimer');
            submitDataUji = $('#submitDataUji');
        }

        function initOnChangeEvent() {
            dateStart.on('change', function () {
                dateEnd.attr('min', dateStart.val());
                if (dateStart.val() > dateEnd.val()) {
                    dateEnd.val(dateStart.val());
                }

                lastId = 0;
                showed = 0;
                hasNext = false;
                getClassifiedWords();
            });

            dateEnd.on('change', function () {
                lastId = 0;
                showed = 0;
                hasNext = false;
                getClassifiedWords();
            });

            order.on('change', function () {
                lastId = 0;
                showed = 0;
                hasNext = false;
                getClassifiedWords();
            });
        }

        function initOnKeyupEvent() {

        }

        function initOnClick() {
            btnMore.on('click', function () {
                getClassifiedWords(true);
            });
        }

        function initOnSubmitEvent(params) {

        }
        /*
         +------------------------------------------------
         | End Init Function Section
         +------------------------------------------------
        */

        /*
         +------------------------------------------------
         | Function Section
         +------------------------------------------------
        */
        function wordCounter() {
            let wordsArray = textArea.val().split(" ");
            wordCounterDisplay.html(`${wordsArray.length} ${(wordsArray.length > 1 ? 'words' : 'word')}`);
        }

        function timer(key) {
            let button, timer;
            switch (key) {
                case 'dataUji':
                        button = submitDataUji;
                        timer = dataUjiTimer;
                    break;
                case 'dataTraining':
                        button = submitDataTraining;
                        timer = dataTrainingTimer;
                    break;
            }
            button.addClass('disabled');
            button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading..');
            setInterval(() => {
                let hour, minute, second, text;
                let dataSecond = parseInt(timer.attr('data-second'));
                dataSecond++;
                hour = Math.floor(dataSecond / (60 * 60));
                minute = Math.floor(dataSecond / 60);
                second = dataSecond % 60;
                text = `${ hour > 0 ? hour + ' h,' : '' } ${ minute > 0 ? minute + ' m,' : '' } ${second} s`;
                timer.attr('data-second', dataSecond);
                timer.html(text);
            }, 1000);
        }

        function loadingToggle() {
            loading.toggleClass('d-none');
        }

        function getClassifiedWords(append = false) {
            if (!append) {
                classifiedWords.html('');
            }
            loadingToggle();
            let query = `lastId=${lastId}&dateStart=${dateStart.val()}&dateEnd=${dateEnd.val()}&order=${order.val()}&showed=${showed}`;
            $.get(`{{ route('home.classifiedWords') }}?${query}`, function (response) {
                if (append) {
                    classifiedWords.append(response.html);
                } else {
                    classifiedWords.html(response.html);
                }
                loadingToggle();
                lastId = response.lastId;
                hasNext = response.hasNext;
                showed += 10;
                if (hasNext) {
                    btnMore.removeClass('d-none');
                } else {
                    btnMore.addClass('d-none');
                }
            });
        }
        /*
         +------------------------------------------------
         | End Function Section
         +------------------------------------------------
        */


        $(document).ready(() => {
            initComponents();
            initOnChangeEvent();
            initOnKeyupEvent();
            initOnSubmitEvent();
            initOnClick();

            getClassifiedWords();
        });
    </script>
@endsection
