@extends('frontend.layout.app')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">SMS Template</strong>
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('sms.store')}}" method="post">
                            @csrf
                            <div class="mx-auto d-block">
                                <div class="mb-5">
                                    <label for="">Template Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <label for="">Message Body</label>
                                <div class="" style="border:1px solid">
                                    <textarea name="message" id="message" style="width:99%;"></textarea>
                                </div>

                            </div>
                            <div class="card-foot mt-5">
                                <button type="reset" class="btn btn-danger">Reset Name & Subject</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
