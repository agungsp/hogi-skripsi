@forelse ($rows as $row)
    <div class="card mb-3 shadow">
        <div class="card-body">
            <div class="d-block d-flex justify-content-between">
                <small class="text-muted">{{ $row->created_at->format('d/m/Y H:i:s') }} - #{{ $row->id }} - {{ $row->filename }}</small>
                <div>
                    <a role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                       tabindex="0" class="text-decoration-none text-secondary me-3"
                       title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    @if ($row->class === 'positif')
                        <i class="fas fa-plus-square fa-lg text-success"></i>
                    @else
                        <i class="fas fa-minus-square fa-lg text-danger"></i>
                    @endif
                </div>
            </div>
            <hr>
            <p>
                {{ $row->text }}
            </p>
        </div>
    </div>
@empty
    <p class="text-center mt-4">
        Data not found!
    </p>
@endforelse
