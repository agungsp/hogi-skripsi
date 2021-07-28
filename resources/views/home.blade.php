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
            <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Data Uji
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Data Training
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('home.inputText') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="words">Masukkan kalimat</label>
                                    <textarea class="form-control" name="textArea" id="textArea" cols="30" rows="5" style="resize: none;" autofocus></textarea>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span class="small" id="wordCounterDisplay">
                                            0 word
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary float-end" type="submit" id="submitText">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('home.inputDataTraining') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="dataTraining">File Data Training</label>
                                    <input class="form-control" type="file" name="dataTraining" id="dataTraining" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                </div>
                                <button class="btn btn-primary float-end" type="submit" id="submitDataTraining">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
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
        let textArea,
            wordCounterDisplay,
            classifiedWords,
            dateStart,
            dateEnd,
            order,
            btnMore;
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

            textArea = $('#textArea');
            wordCounterDisplay = $('#wordCounterDisplay');
            classifiedWords = $('#classifiedWords');
            dateStart = $('#dateStart');
            dateEnd = $('#dateEnd');
            order = $('#order');
            btnMore = $('#btnMore');
        }

        function initOnChangeEvent() {
            textArea.on('change', function () {
                wordCounter();
            });

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
            textArea.on('keyup', function (e) {
                wordCounter();
            });
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
