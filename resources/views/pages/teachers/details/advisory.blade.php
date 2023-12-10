<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Advisory Information</h4>
            <div class="nk-block-des">
                <p>View Teachers Classroom Advisory</p>
            </div>
        </div>
        <div class="nk-block-head-content align-self-start d-lg-none">
            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                    class="icon ni ni-menu-alt-r"></em></a>
        </div>
    </div>
</div>
<div class="nk-block">
    <table class="datatable-init table">
        <thead>
            <tr>
                <th>Section Name</th>
                <th>-</th>
                <th width="50">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advisory as $rw)
                <tr>
                    <td>{{ $rw->sec_name }} </td>
                    <td>Grade {{ $rw->sec_grade }} / {{ $rw->sec_schoolyear }}</td>
                    <td>
                        <li>
                            <div class="drodown" style="">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger "
                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="/sections/view/{{ $rw->sec_id }}" target="_blank">
                                                <em class="icon ni ni-eye"></em>
                                                <span>View Students</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
