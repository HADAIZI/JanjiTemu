<x-app-layout>
    <x-slot name="header">
        <h1 class="display-6"><b>Selamat datang, </b><b><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></b></h1>
    </x-slot>
    <!-- Part Your Event Card -->
    <div class="row ms-4 mt-4">
        @if($events->count() == 0)
            <h1>No Events Joined Yet</h1>
        @else
        @foreach($events as $event)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset(str_replace('public', 'storage', $event->e_image)) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('event.geteventdetail', ['group_id' => $event->g_id, 'event_id' => $event->e_id]) }}">{{$event->e_name}}</a></h5>
                    <p class="card-text">Hosted by : {{$event->g_name}}</p>
                    <p class="card-text">Place: {{ $event->e_place }}</p>
                    <p><i class="bi bi-calendar4-event"></i>{{ date('d M Y H:i:s', strtotime($event->e_date)) }}</p>
                    <h6><i class="bi bi-ticket-perforated"></i> FREE</h6>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <br><br>

    <button class="btn btn-primary btn-lg custom-btn" onclick="window.location='{{ route('group.getcreate') }}'" role="button">Buat grup baru <i class="bi bi-plus-circle"></i>
    </button>


    <br>
    <!-- Part Your Group -->

    <br>
    <!-- Part Purple Box -->
    @if($groups->count() == 0)
        <h1>No Events Joined Yet</h1>
    @else
    @foreach($groups as $group)
    <div class="row rounded p-3" style="background-color:#7879DF;">
        <div class="col-md ms-2">
            <div class="row row-gap-3 justify-content-center">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <div class="ms-5">
                                <h3 class="card-title ms-4"><strong>{{$group->g_name}}</strong></h3>
                            </div>
                            <div class="float-end">
                                <a href="{{ route('group.getgroupbyid', ['group_id' => $group->g_id])}}" class="btn" style="text-decoration: underline; text-decoration-color: #7879DF; text-decoration-thickness: 1.5px; text-underline-offset: 10px; font-weight:700; color:#7879DF">Lihat grup</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <br><br><br>
</x-app-layout>