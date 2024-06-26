@extends('master.user')

@section('main')

@section('title', 'Dashboard')
<style>
    .dashboard-card-link {
        text-decoration: none;
        color: inherit;
    }

    .dashboard-card {
        background-color: #5bc0de;
        color: #fff;
        border: none;
        border-radius: 4px;
        margin-bottom: 15px;
        transition: transform 0.2s ease-in-out, background-color 0.2s ease-in-out;

    }

    .dashboard-card .card-header {
        /* background-color: #31b0d5; */
        /* Slightly darker blue for header */
        padding: 10px 15px;
        font-size: 18px;
        font-weight: bold;
        border-bottom: 1px solid transparent;
        border-radius: 3px 3px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .dashboard-card .card-body {
        padding: 10px;
        font-size: 20px;
    }





    .card-header i {
        font-size: 110px;

    }

    .dashboard-card-link:hover .dashboard-card {
        transform: scale(1.05);
        background-color: #31b0d5;
        text-decoration: none;
        /* Remove underline */
    }

    .dashboard-card-link:hover .dashboard-card .card-header {
        border-bottom: 1px solid transparent;
        /* Remove border bottom on hover */
    }
</style>

<div class="container">

    <div class="row">
       

        <div class="col-md-3">
            <a href="{{ route('user.profile.show') }}" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="card-body text-center">
                       Thông tin Nhà khoa học
                    </div>
                </div>

            </a>
        </div>
        
        <div class="col-md-3">
            <a href="{{ route('user.projects.index') }}" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="card-body text-center">
                        Đề tài/Đề án
                    </div>
                </div>

            </a>
        </div>
       
        <div class="col-md-3">
            <a href="{{ route('user.magazines.index') }}" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="card-body text-center">
                        Bài báo khoa học
                    </div>
                </div>

            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('user.curriculums.index') }}" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="card-body text-center">
                        Giáo trình/Sách tham khảo
                    </div>
                </div>

            </a>
        </div>
       
       
       



    </div>
</div>

@stop()
