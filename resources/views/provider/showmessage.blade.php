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
                                            <h2 class="card-text">Recipent : {{ $meeting->customer->username }}</h2>
                                            <label for="messagebody"
                                                   class="col-md-4 col-form-label text-md-right">Message</label>
                                            <input type="text" name="messagebody" value="Enter Your message">



@csrf

                                                    <button type="submit" class="btn-secondary">Send</button>
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
