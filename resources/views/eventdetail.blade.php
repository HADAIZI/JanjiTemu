<x-app-layout>
    <x-slot name="header">
        <h2 class="h2"><b>{{ $result->e_name }}</b></h2>
        <p class="text-secondary">{{ $total }} peserta terdaftar</p>
        <p class="text-secondary">Diselenggarakan oleh <a class="link-underline link-underline-opacity-0" href="{{ route('group.getgroupbyid', ['group_id' => $result->g_id])}}"> {{$result->g_name}}</a></p>
    </x-slot>

    <div class="row">
        <div class="col-7">
            <figure class="figure">
                <img src="{{ asset(str_replace('public', 'storage', $result->e_image)) }}" class="figure-img img-fluid rounded" alt="..." style="max-width: 550px;">
            </figure>
        </div>
        <div class="col">
            <h5 class="h5"><strong><a class="link-underline link-underline-opacity-0" href="">{{$result->g_name}}</a></strong></h5>
            <p class="h6 mt-3 text-body-tertiary"><i class="bi bi-people"></i> {{$result->g_users}} orang</p>
            <br><br>
            <div class="card mb-5" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Pelaksanaan Event</h5>
                    <p class="card-text"><i class="bi bi-calendar4-event"></i> {{$result->e_date}}</p>
                    <p class="card-text"><i class="bi bi-geo-alt"></i>{{$result->e_place}}</p>
                </div>
            </div>
            <div class="d-grid d-md-flex mt-3 justify-content-start">
                <a href="{{ route('event.joinevent', ['group_id' => $result->g_id, 'event_id' => $result->e_id]) }}" class="btn btn-primary btn-lg custom-btn me-5" role="button">Daftar Event <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <h4 class="h4">Deskripsi Event</h4>
            <p>{{$result->e_description}}</p>
        </div>
    </div>
    <br><br>
</x-app-layout>