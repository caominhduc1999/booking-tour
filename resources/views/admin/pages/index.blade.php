@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $newBookings }}</h3>

                        <p>Đặt tour mới</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalUser }}</h3>

                        <p>Tổng số người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalTour }}</h3>

                        <p>Tổng số tour</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalArticle }}</h3>

                        <p>Tổng số bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div>
            <div>
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="month" id="">
                                <option value="">Tháng hiện tại</option>
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="year" id="">
                                <option value="">Năm hiện tại</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success">Thống kê</button>
                        </div>
                    </div>
                   
                    <br>
                   
                </form>
            </div>
            <canvas id="myChart"></canvas>
            <canvas id="myRevenue" style="margin-top :100px"></canvas>
        </div>
    </div>
   
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let revenueDataset = @json($revenue);
        let tourDataset = @json($tours);

        const labels = Object.keys(tourDataset);
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Số lượng tour đặt',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: Object.values(tourDataset),
                },
            ]
        };
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        const label_revenue = Object.keys(revenueDataset);
        const data_revenue = {
            labels: label_revenue,
            datasets: [{
                label: 'Doanh thu (VND)',
                backgroundColor: 'rgb(99, 255, 132)',
                borderColor: 'rgb(99, 255, 132)',
                data: Object.values(revenueDataset),
            }, ]
        };
        const config_revenue = {
            type: 'bar',
            data: data_revenue,
            options: {}
        };
        const myRevenue = new Chart(
            document.getElementById('myRevenue'),
            config_revenue
        );
    </script>
@endsection
