@extends('frontend_seller.layout.index')

@section('content')
    <div class="row" >
        <div class="container col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
            <h4 class=""><i class="fa fa-bars">&nbsp;Help & Support</i></h4>
            <div class="d-flex flex-row-reverse"><a href="#"><input type="button" class="btn btn-info" value="Request"></a></div>
        </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">

                    <table class="table table-hover">
                        <thead>
                          <tr >
                            <th style="width: 10%" scope="col">Request ID</th>
                            <th style="width: 60%" scope="col">Subject</th>
                            <th style="width: 10%" scope="col">Date</th>
                            <th style="width: 10%" scope="col">Status</th>
                            <th style="width: 10%"scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="table-success">
                            <th scope="row">1</th>
                            <td>(today)Monday 18,2020 - 12:30</td>
                            <td>21-mar-23</td>
                            <td><span class="label label-info">Solved</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                  </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark is annowed with all thsi  sdsdn,ks,d  ,nknlsdnj</td>
                            <td>21-mar-23</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                  </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark is annowed with all thsi  sdsdn,ks,d  ,nknlsdnj</td>
                            <td>21-mar-23</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                  </div>
                            </td>
                          </tr>
                         
                        </tbody>
                      </table>






                    {{-- Request Model --}}
                    {{-- <form action="/">
                        <div class="row">       
                            <h5>Subject:</h5>
                            <input type="text" class="form-control">
                        </div><br>
                        <div class="row">       
                            <h5>Description:</h5>
                            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div><br>
                        <input type="submit" class="btn btn-success"> 
                    </form> --}}
                    
                </p>
            </div>
        </div>
        </div>
    </div>
@endsection
