@extends('Seller.layout.index')

@section('content')
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div>
                        <h5 class="card-title">Sales Overview</h5>
                        <h6 class="card-subtitle">Check the monthly sales </h6>
                    </div>
                <a href="{{route('seller.logout')}}">Logout</a>
                    <div class="mr-auto">
                        <select class="custom-select b-0">
                            <option>January</option>
                            <option value="1">February</option>
                            <option value="2" selected="">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                   
                    <div class="ml-auto">
                        <select class="custom-select b-0">
                            <option>January</option>
                            <option value="1">February</option>
                            <option value="2" selected="">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                    <div>
                    <a class="btn btn-success d-none d-lg-block m-l-15" href="{{route('add.product.form')}}"><i class="fa fa-bars"></i>&nbsp; Add Product</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NAME</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="txt-oflo">Elite admin</td>
                            <td class="txt-oflo">April 18, 2017</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="txt-oflo">Real Homes WP Theme</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="txt-oflo">Ample Admin</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="txt-oflo">Medical Pro WP Theme</td>
                            <td class="txt-oflo">April 20, 2017</td>
                            <td><span class="text-danger">-$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td class="txt-oflo">Hosting press html</td>
                            <td class="txt-oflo">April 21, 2017</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td class="txt-oflo">Digital Agency PSD</td>
                            <td class="txt-oflo">April 23, 2017</td>
                            <td><span class="text-danger">-$14</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td class="txt-oflo">Helping Hands WP Theme</td>
                            <td class="txt-oflo">April 22, 2017</td>
                            <td><span class="text-success">$64</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td class="txt-oflo">Helping Hands WP Theme</td>
                            <td class="txt-oflo">April 22, 2017</td>
                            <td><span class="text-success">$64</span></td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td class="txt-oflo">Ample Admin</td>
                            <td class="txt-oflo">April 19, 2017</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection