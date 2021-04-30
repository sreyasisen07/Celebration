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



                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <h2 class="card-text">Provider : {{ $provider->username }}</h2>
                                            <form method="POST" action="{{  route('customer.addmeeting', $provider->id) }}">
                                            @csrf
                                                <div class="form-group row">
                                                <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>

                                                <div class="col-md-6">
                                                    <input id="date" type="date" class="form-control" name="date" value="YYYY-MM-DD">


                                                </div>
                                                    <button type="submit" class="btn btn-secondary">Confirm</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </section>







@endsection
