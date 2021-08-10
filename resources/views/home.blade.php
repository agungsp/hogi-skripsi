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
            <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>

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

            loading = document.querySelector('#loading');

            classifiedWords = document.querySelector('#classifiedWords');
            btnMore = document.querySelector('#btnMore');
            dataTrainingTimer = document.querySelector('#dataTrainingTimer');
            submitDataTraining = document.querySelector('#submitDataTraining');
            dataUjiTimer = document.querySelector('#dataUjiTimer');
            submitDataUji = document.querySelector('#submitDataUji');
        }

        function initOnChangeEvent() {

        }

        function initOnKeyupEvent() {

        }

        function initOnClick() {
            btnMore.addEventListener('click', () => getClassifiedWords(true));
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
            button.classList.add('disabled');
            button.innerHtml = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading..';
            setInterval(() => {
                let hour, minute, second, text;
                let dataSecond = parseInt(timer.getAttibute('data-second'));
                dataSecond++;
                hour = Math.floor(dataSecond / (60 * 60));
                minute = Math.floor(dataSecond / 60);
                second = dataSecond % 60;
                text = `${ hour > 0 ? hour + ' h,' : '' } ${ minute > 0 ? minute + ' m,' : '' } ${second} s`;
                timer.setAttribute('data-second', dataSecond);
                timer.innerHtml = text;
            }, 1000);
        }

        function loadingToggle() {
            loading.classList.toggle('d-none');
        }

        function getClassifiedWords(append = false) {
            if (!append) {
                classifiedWords.innerHtml = '';
            }
            loadingToggle();
            let query = `lastId=${lastId}&showed=${showed}`;
            $.get(`{{ route('home.classifiedWords') }}?${query}`, function (response) {
                if (append) {
                    classifiedWords.innerHtml += response.html;
                } else {
                    classifiedWords.innerHtml = response.html;
                }
                loadingToggle();
                lastId = response.lastId;
                hasNext = response.hasNext;
                showed += 10;
                if (hasNext) {
                    btnMore.classList.remove('d-none');
                } else {
                    btnMore.classList.add('d-none');
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
