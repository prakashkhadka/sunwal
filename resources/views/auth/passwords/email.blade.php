@extends('layouts.masterLayout.home')

<style>
    .mainSection{
        margin-top: 200px;
    }
    .passwordReset{
        font-size:15pt;
        font-weight:bold;
    }
</style>
@section('content')
<section class="mainSection"></section>
<div class="container text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="passwordReset text-info col-md-offset-2">पासवर्ड रिसेट गर्नुहोस</span></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <!--
                            {{ session('status') }}
                            -->
                            पासवर्ड रिसेट गर्ने लिंक तपाइको इमेल एड्रेसमा पठाएका छौ l कृपया त्यहा हेर्नुहोला l
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">
                            <div>इमेल एड्रेस </div>
                            <div>E-Mail Address</div>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>
                                            माफ गर्नुहोला ! यो इमेल हाम्रो रेकर्डमा छैन l
                                            <!--
                                            {{ $errors->first('email') }}
                                            -->
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    इमेलमा रिसेट लिंक पठाउनुहोस
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8s col-md-offset-2">
                                यो इमेल कहिलेकाही तपाइको इमेलको स्पाम (Spam) फोल्डर भित्र पनि जान सक्छ l  त्यसैले यदि इनबक्समा पासवर्ड रिसेटको इमेल नभेट्नु भएमा त्यहा एकपटक हेर्नुहोला l    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
