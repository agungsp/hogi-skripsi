@forelse ($rows as $row)
    <div class="card mb-3 shadow">
        <div class="card-body">
            <div class="d-block d-flex justify-content-between">
                <small class="text-muted">{{ $row->created_at->format('d/m/Y H:i:s') }} - #{{ $row->id }}</small>
                @if ($row->class === 'positif')
                    <i class="fas fa-plus-square fa-lg text-success"></i>
                @else
                    <i class="fas fa-minus-square fa-lg text-danger"></i>
                @endif
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
