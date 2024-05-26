<x-app-layout>
    <x-slot name="header">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#desc" style="color: #7879DF;"><b>Deskripsi</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#members" style="color: #7879DF;"><b>Anggota</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#events" style="color: #7879DF;"><b>Event</b></a>
            </li>
        </ul>
    </x-slot>
    <div class="row">
        <div class="col">
            <h3 class="h3"><strong>{{ $results->g_name }}</strong></h3>
            <p class="h6 mt-3 text-body-tertiary"><i class="bi bi-people"></i> {{ $results->g_users }}</p>
            <p class="h6 mt-3 text-body-tertiary"><i class="bi bi-person-check"></i> Group Owner <b>{{ $group_master->first_name.' '.$group_master->last_name }}</b></p>
        </div>
        @if($user_status == null)
        <form method="POST" action="{{ route('group.joingroup', ['group_id' => $group_id]) }}">
            @csrf
            <button type="submit" class="btn btn-primary" style="color:white;">Join Group</button>
        </form>
        @endif
    </div>

    <!-- button to create new event -->
    @if($user_status == 1 || $user_status == 2)
    <div class="d-grid d-md-flex mt-3 justify-content-end">
        <a href="{{ route('event.eventindex', ['group_id' => $group_id]) }}" class="btn btn-primary btn-lg custom-btn me-5" role="button">Buat event baru <i class="bi bi-plus-circle"></i></a>
    </div>
    @endif

    <div class="mt-5">
        <div class="row">
            <div class="col-8">
                <div id="desc">
                    <h4 class="h4">Deskripsi Grup</h4>
                    <p>{{ $results->g_description }}</p>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="position-relative text-center">
                        <p class="mb-0"><strong>Pemilik Grup</strong></p>
                        <img src="/img/event2.jpg" class="card-img-top rounded-circle img-thumbnail position-absolute start-0 top-0 ms-2 mt-4" alt="..." style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <div class="ms-5">
                            <h3 class="card-title ms-4"><strong>{{ $group_master->first_name.' '.$group_master->last_name }}</strong></h3>
                            <p class="card-text ms-4"><em>Group Master</em></p>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" style="width: 250px;">
                    <div class="position-relative ms-2">
                        <p class=""><strong>Jumlah Anggota</strong></p>
                    </div>
                    <div class="card-body">
                        <div class="ms-5">
                            <h3 class="card-title ms-4"><i class="bi bi-people"></i> <em>{{ $results->g_users }}</em></h3>
                        </div>
                    </div>
                    <div class="position-relative ms-2">
                        <p class=""><strong>Jumlah Event</strong></p>
                    </div>
                    <div class="card-body">
                        <div class="ms-5">
                            <h3 class="card-title ms-4"><i class="bi bi-calendar4-event"></i> <em>{{ $results->total_event }}</em></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br>
        <div id="members">
            <h4 class="h4">Anggota Grup</h4>
            <div class="scroll" style="height: 300px; overflow: scroll;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            @if($user_status == 1)
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($members as $member)
                        <tr>
                            <th scope="row">{{ $counter }}</th>
                            <td>{{ $member->first_name.' '.$member->last_name }}</td>
                            <td>{{ $member->role }}</td>
                            @if($user_status == 1)
                            <td>
                                @switch($member->role)
                                    @case('moderator')
                                        <a href="{{ route('privilege.setadmin', ['group_id' => $group_id, 'user_id' => $member->id]) }}" class="btn btn-danger btn-sm" role="button">Set To Admin</a>
                                        <a href="{{ route('privilege.setmember', ['group_id' => $group_id, 'user_id' => $member->id]) }}" class="btn btn-primary btn-sm" role="button">Set To Member</a>
                                        @break
                                    @case('member')
                                        <a href="{{ route('privilege.setmoderator', ['group_id' => $group_id, 'user_id' => $member->id]) }}" class="btn btn-success btn-sm" role="button">Set To Moderator</a>
                                        @break
                                @endswitch
                            </td>
                            @endif
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br>
        <div id="events">
            <h4 class="h4">Event grup ini</h4>
            <!-- Part Event of The Group Card -->
            <div class="grid gap-0 row-gap-3" id="group-event-card">
                @if($results->total_event > 0)
                    @foreach($events as $event)
                    <div class="card position-relative" style="width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ str_replace('public', 'storage', $event->e_image) }}" class="card-img-top img-fluid" alt="Event Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#">{{ $event->e_name }}</a></h5>
                                    <p class="card-text">Hosted by: {{ $event->g_name }}</p>
                                    <p><i class="bi bi-calendar4-event"></i> {{ \Carbon\Carbon::parse($event->e_date)->format('l, d M Y - H:i A') }}</p>
                                    <h6><i class="bi bi-ticket-perforated"></i> FREE</h6>
                                    <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                                        @if($user_status === 3 || $user_status == null)
                                        <button href="#" class="btn btn-primary" style="color:white;">Join Event</button>
                                        @else
                                        {{-- <button href="#" class="btn btn-primary" style="color:white;">Edit Event</button>
                                        <button href="#" class="btn btn-danger" style="color:white">Hapus Event</button> --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <h4 class="h4"><strong>Belum ada event yang diadakan oleh grup ini</strong></h3>
                @endif
            </div>
            <!-- Modal for Editing Event-->
            <div class="modal fade" id="editEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Event</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('event.store', ['group_id' => $group_id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="e_name" class="form-label">Nama Event</label>
                                    <input type="text" class="form-control rounded custom-border" id="e_name" name="e_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="e_description" class="form-label">Deskripsi Event</label>
                                    <textarea class="form-control" id="e_description" name="e_description" rows="4" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="e_place" class="form-label">Tempat atau Lokasi Event</label>
                                    <input type="text" class="form-control rounded custom-border" id="e_place" name="e_place" required>
                                </div>

                                <div class="mb-3">
                                    <label for="e_image" class="form-label">Poster Event</label>
                                    <input type="file" class="form-control rounded custom-border custom-height" id="e_image" name="e_image" accept="image/*" required>

                                </div>

                                <div class="mb-3">
                                    <label for="e_date" class="form-label">Tanggal Pelaksanaan Event</label>
                                    <input type="date" class="form-control rounded custom-border" id="e_date" name="e_date" required>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-primary edit-btn">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary mod-btn-exit" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </div>



</x-app-layout>