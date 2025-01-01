@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Liên Hệ</h4>
                    <div class="table-responsive">
                        <table class="table">
                            @php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<div class="alert alert-success alert-dismissible">';
                                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                    echo '<strong>Success!</strong> ' . $message;
                                    echo '</div>';
                                    Session::forget('message');
                                }
                            @endphp
                            <thead>
                                <tr>
                                    <th>Tên người gửi</th>
                                    <th>Emaill</th>
                                    <th>Lời nhắn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->contact_name }}</td>
                                        <td>{{ $item->contact_email }}</td>
                                        <td>{{ $item->contact_mess }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
