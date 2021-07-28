@extends('layout')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- TITLE --}}
@section('title', 'Singkatan')

{{-- CONTENT --}}
@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">
                    <form id="formSingkatan" method="post">
                        <div class="mb-3">
                            <label for="excelFile" class="form-label">
                                Excel File
                            </label>
                            <input type="file" name="excelFile" id="excelFile" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="btnUpload">
                                <i class="fa fa-upload"></i> Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- MODAL --}}
@section('modal')
    <div class="modal fade" id="modalSingkatan" tabindex="-1" aria-labelledby="modalSingkatanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSingkatanLabel">Sortir Singkatan</h5>
                </div>
                <div class="modal-body" id="modalSingkatanBody"></div>
                <div class="modal-footer">
                    <button id="btnSave" type="submit" form="formSingkatanEditor" class="btn btn-primary" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- JS --}}
@section('js')
    <script>
        /*
         +------------------------------------------------
         | Variable Section
         +------------------------------------------------
        */
        let modalSingkatan,
            modalSingkatanBody,
            btnSave;

        let loading;
        let excelFile,
            btnUpload;
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
            modalSingkatan = new bootstrap.Modal(
                document.getElementById('modalSingkatan'), {
                    backdrop: 'static',
                    keyboard: false,
                });
            modalSingkatanBody = $('#modalSingkatanBody');
            btnSave = $('#btnSave');


            loading = `<div class="row justify-content-center">
                           <div class="col-auto">
                               <div class="spinner-border text-primary" role="status">
                                   <span class="visually-hidden">Loading...</span>
                               </div>
                           </div>
                       </div>`;


            excelFile = $('#excelFile');
            btnUpload = $('#btnUpload');
            btnUploadState(0);

        }

        function initOnChangeEvent() {
            $('body').on('change', excelFile, function () {
                btnUploadState(1);
            });
        }

        function initOnSubmitEvent(params) {
            $('#formSingkatan').on('submit', function (e) {
                e.preventDefault();
                modalSingkatan.show();
                modalSingkatanBody.html(loading);
                btnUploadState(2);
                btnSaveState(0);

                let formData = new FormData(this);
                $.ajax(
                    ajaxFormDataSetup(
                        "{{ route('singkatan.upload') }}",
                        formData,
                        (response) => {
                            btnUploadState(3);
                            modalSingkatanBody.html(response.html);
                            if (response.count > 0) {
                                btnSaveState(1);
                            }
                        },
                        (response) => {
                            if (response.status) {
                                // showValidation(response.responseJSON.errors);
                            }
                            else {

                            }
                        }
                    )
                );
            });
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
        function btnUploadState(state = 0) {
            switch (state) {
                case 0:
                    btnUpload.addClass('btn-primary');
                    btnUpload.removeClass('btn-success');
                    btnUpload.prop('disabled', true);
                    btnUpload.html(
                        `<i class="fa fa-upload"></i> Upload`
                    );
                    break;
                case 1:
                    btnUpload.addClass('btn-primary');
                    btnUpload.removeClass('btn-success');
                    btnUpload.prop('disabled', false);
                    btnUpload.html(
                        `<i class="fa fa-upload"></i> Upload`
                    );
                    break;
                case 2:
                    btnUpload.addClass('btn-primary');
                    btnUpload.removeClass('btn-success');
                    btnUpload.prop('disabled', true);
                    btnUpload.html(
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading..`
                    );
                    break;
                case 3:
                    btnUpload.addClass('btn-success');
                    btnUpload.removeClass('btn-primary');
                    btnUpload.prop('disabled', true);
                    btnUpload.html(
                        `<i class="fas fa-check-circle"></i> Uploaded`
                    );
                    break;
            }
        }

        function btnSaveState(state = 0) {
            switch (state) {
                case 0:
                    btnSave.addClass('btn-primary');
                    btnSave.removeClass('btn-success');
                    btnSave.prop('disabled', true);
                    btnSave.html(
                        `<i class="fa fa-save"></i> Save`
                    );
                    break;
                case 1:
                    btnSave.addClass('btn-primary');
                    btnSave.removeClass('btn-success');
                    btnSave.prop('disabled', false);
                    btnSave.html(
                        `<i class="fa fa-save"></i> Save`
                    );
                    break;
                case 2:
                    btnSave.addClass('btn-primary');
                    btnSave.removeClass('btn-success');
                    btnSave.prop('disabled', true);
                    btnSave.html(
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving..`
                    );
                    break;
                case 3:
                    btnSave.addClass('btn-success');
                    btnSave.removeClass('btn-primary');
                    btnSave.prop('disabled', true);
                    btnSave.html(
                        `<i class="fas fa-check-circle"></i> Saved`
                    );
                    break;
            }
        }

        function toggleList(index) {
            $(`#words${index}`).prop('disabled',
                !$(`#isUses${index}`).prop('checked')
            );
            $(`#means${index}`).prop('disabled',
                !$(`#isUses${index}`).prop('checked')
            );
        }

        /*
         +------------------------------------------------
         | End Function Section
         +------------------------------------------------
        */


        $(document).ready(() => {
            initComponents();
            initOnChangeEvent();
            initOnSubmitEvent();
        });
    </script>
@endsection
