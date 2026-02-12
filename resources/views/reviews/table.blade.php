<table id="employeesTable" class="table">
    <thead class="table-light">
        <tr>
            <th class="mw-120"> ID</th>
            <th class="mw-150">Student Name</th>
            <th class="mw-150">Course Name</th>
            <th class="mw-150">Rating</th>
            <th class="mw-150">Reviews</th>
            <th class="mw-100">Status</th>
            <th class="mw-100">Action</th>
        </tr>
    </thead>

    <tbody>
       @foreach ($data as $datas)
             <tr>
                <td><span>{{ $datas?->id }}</span></td>
                <td>
                    <div class="d-flex">
                        <img src="{{ asset('reviews/' . ($datas?->profile ?? 'default.png')) }}"
                            class="avatar avatar-sm me-2" alt="">
                        <div class="clearfix">
                            <h6 class="mb-0">{{ $datas?->student_name }}</h6>
                        </div>
                    </div>
                </td>
                <td><span>{{ $datas?->course_name }}</span></td>
                <td><span>{{ $datas?->review }}</span></td>
                <td><span> @for ($i = 1; $i <= ($datas?->rating); $i++)
                            {{' ⭐' }}
                        @endfor </span></td>
                <td>
                    <span class="badge badge-success light">
                        @if ($datas?->status == 1)
                            Active
                        @else
                            In-Active
                        @endif
                    </span>
                </td>
                
                <td class="">
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-primary light btn-square"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item editBtn" data-id="{{ $datas?->id }}">Edit</a></li>
                            <li>
                                <a class="dropdown-item text-danger toggle-status" data-id="{{ $datas?->id }}" data-url="{{ route('delete.reviews') }}"  href="javascript:void(0);">
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
       @endforeach
    </tbody>
</table>
