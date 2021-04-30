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



                                    <div style="margin-bottom:7%;">
                                        <hr>
                                    </div>

                                    <form method="POST" action="{{ route('provider.addservice') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" autocomplete="name"
                                                    autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>





                                        <div class="form-group row">
                                            <label for="capacity"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Capacity') }}</label>

                                            <div class="col-md-6">
                                                <input id="capacity" type="text"
                                                    class="form-control @error('capacity') is-invalid @enderror"
                                                    name="capacity" value="{{ old('capacity') }}"
                                                    autocomplete="capacity">

                                                @error('capacity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pricerange"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Price Range') }}</label>

                                            <div class="col-md-6">
                                                <input id="pricerange" type="text"
                                                    class="form-control @error('pricerange') is-invalid @enderror"
                                                    name="pricerange" autocomplete="new-pricerange">

                                                @error('pricerange')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-dark-green MyButton">
                                                    Add
                                                </button>
                                            </div>
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
