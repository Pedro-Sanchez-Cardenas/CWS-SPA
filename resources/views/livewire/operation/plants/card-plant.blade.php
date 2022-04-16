<div wire:poll.1000ms class="col-xl-4 col-md-6 col-12">
    <div class="card card-congratulation-medal">
        <div class="card-body">
            <h5>{{ $plant->name }}</h5>
            <p class="card-text font-small-3">{{ $plant->location }}</p>
            <h3 class="mb-75 mt-2 pt-50">
                @if ($plant->cover_path != '')
                    <img src="{{ $plant->cover_path }}" class="img-thumbnail" alt="">
                @else
                    <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                        class="img-thumbnail" alt="error img plant">
                @endif
            </h3>
        </div>
        <div class="card-footer">
            <p class="card-subtitle mb-2 text-muted text-capitalize">Last Parameters:
                @if ($plant->product_waters->first())
                    <span class="text-primary">{{ $plant->product_waters->first()->created_at }}</span>
                    <span
                        class="text-danger">{{ \Carbon\Carbon::create($plant->product_waters->first()->created_at)->diffForHumans() }}</span>
                @else
                    <span class="text-danger">N/A</span>
                @endif
            </p>
        </div>
    </div>
</div>
