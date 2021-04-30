@extends('master')

@section('content')
    @include('header2')
    <!-- Page Wrapper -->

    <section id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">


                        <div class="card-body">



                            <div class="card-deck">

                            @foreach($meetings as $meeting)

                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <h2 class="card-text">Customer : {{ $meeting->customer->username }}</h2>
                                            <h2 class="card-text">Date : {{ $meeting->date }}</h2>
                                            <h2 class="card-text">{{ $meeting->id }}</h2>


                                                <div class="form-group row">
                                                <label for="submit" class="col-md-4 col-form-label text-md-right">Status</label>
@csrf

                                                    <a href="{{  route('provider.acceptmeeting', $meeting->id) }}" class="btn btn-secondary">Approve</a>
                                            </div>


                                        </div>
                                    </div>
                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </section>







@endsection
