@extends('master.admin')

@section('main')

@section('title', 'Dashboard')

<style>
    .status-dang-thuc-hien {
        background-color: yellow;
        color: black;
    }
    .status-da-hoan-thanh {
        background-color: green;
        color: white;
    }
    .status-chua-bat-dau {
        background-color: gray;
        color: white;
    }
</style>

<div class="container mt-5">
    <h1>Báo cáo tiến độ</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên đề tài</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{ $topic->topic_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($topic->start_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($topic->end_date)->format('d/m/Y') }}</td>
                    <td class="
                        @if ($topic->status == 'Đang thực hiện') status-dang-thuc-hien 
                        @elseif ($topic->status == 'Đã hoàn thành') status-da-hoan-thanh 
                        @endif
                    ">{{ $topic->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@stop()