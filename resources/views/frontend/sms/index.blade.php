@extends('frontend.layout.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">SMS Template List</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Template Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($template as $temp)
                                <tr>
                                    <td>{{$temp->name}}</td>
                                    <td>{{$temp->message}}</td>
                                    <td><a href="" class="btn btn-primary">Preview template</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$template->links()}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')

@stop
