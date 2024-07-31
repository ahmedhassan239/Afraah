@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Session()->has('Success'))
        <div class="alert alert-success">{{ Session()->get('Success') }}</div>
            @php
            Session()->forget('Success');
            @endphp
        @endif
        @if(Session()->has('Error'))
        <div class="alert alert-danger">{{ Session()->get('Error') }}</div>
            @php
            Session()->forget('Error');
            @endphp
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card mt-4 ">
                    <div class="card-body text-center ">
                        <div>
                            <h3 class="mt-3 mb-3"> Afraah </h3>
                            <svg class="block mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" width="100" height="2" viewBox="0 0 100 2">
                                <path fill="#D8E3EC" d="M0 0h100v2H0z"></path>
                            </svg>
                        </div>
                        <form method="post" class="col-md-8 m-auto text-left " action="{{ route('user-regist') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="name">{{ __('English Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="name">{{ __('Arabic Name') }}</label>
                                    <input id="arabic_name" type="text" class="form-control @error('arabic_name') is-invalid @enderror" name="arabic_name" value="{{ old('arabic_name') }}" required autocomplete="name" autofocus>

                                    @error('arabic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12 register-form">
                                    <label for="email" >{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="phone" >{{ __('Phone Number') }}</label>

                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="country_id">{{__('Country')}}</label>

                                    <select class="form-control country" name="country_id" id="country" data-dependent="city">
                                        <option disabled selected>Select Country</option>
                                        @foreach ($countries as $country )
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="city">{{__('City')}}</label>
                                    <div id="city">
                                        <select id="cities" name="city_id"class="cityname form-control">
                                            <option value="" disabled selected>Select City</option>
                                        </select>

                                    </div>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="country">{{__('Category')}}</label>

                                    <select class="form-control category" name="category_id" id="category" data-dependent="service">
                                        <option disabled selected>Select Category</option>
                                        @foreach ($categories as $cat )
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="service">{{__('Service')}}</label>
                                    <div id="service">
                                        <select id="services" name="service_id"class="servicename form-control">
                                            <option value="" disabled selected>Select Service</option>
                                        </select>

                                    </div>
                                    @error('service_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 register-form">
                                    <label for="gender">{{__('Gender')}}</label>
                                    <div id="gender">
                                        <select id="gender" name="gender" class="gendername form-control">
                                            <option value="" disabled selected>Select Your Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{ csrf_field() }}


                            <div class="form-group row">

                                <div class="col-sm-12 register-form">
                                    <label for="password"  >{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12 register-form">
                                    <label for="password-confirm"  >{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 mt-4 mb-5  ">
                                    <button type="submit" class="btn btn-register" >
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type=text/javascript>
        $(document).ready(function(){
            $('.country').on('change',function(){
                $('#cities').html('');
                var country_id=$(this).val();
                var div =$(this).parent();
                //  console.log(country_id);
                var city = document.getElementById('cities')
                // console.log(city);
                var op=" ";
                $.ajax({
                    type:'get',
                    url:"{{route('cities')}}",
                    data:{id:country_id},
                    success:function(data){
                        // console.log('success');
                        // console.log(data);
                        op+='<option value="0" selected disabled>Select City</option>';
                        Object.keys(data).forEach(key => {
                        op+=`<option class="form-control" value="${key}">${data[key]}</option>`;
                        });
                        $('.cityname').append(op);
                    },
                    error:function(){
                    }
                });
            });
        });
    </script>
    <script type=text/javascript>
        $(document).ready(function(){
            $('.category').on('change',function(){
                $('#services').html('');
                var category_id=$(this).val();
                var div =$(this).parent();
                //  console.log(country_id);
                var service = document.getElementById('services')
                var op=" ";
                $.ajax({
                    type:'get',
                    url:"{{route('services')}}",
                    data:{id:category_id},
                    success:function(data){
                        // console.log(data);
                        op+='<option value="0" selected disabled>Select Service</option>';
                        Object.keys(data).forEach(key => {
                            op+=`<option class="form-control" value="${key}">${data[key]}</option>`;
                        });
                        $('.servicename').append(op);
                    },
                    error:function(){
                    }
                });
            });
        });
    </script>
@endsection

