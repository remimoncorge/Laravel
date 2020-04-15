@extends('main')

@section('content')

    @if(session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @elseif(session()->has('error_message') && session()->get('error_message') != '')
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif

    <form name="sentMessage" id="contactForm" method="post" action="{{ route('contact.store') }}" novalidate>
        {{ csrf_field() }}
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger">{{ $errors->first('name') }}</p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger">{{ $errors->first('email') }}</p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message.">{{ old('message') }}</textarea>
                <p class="help-block text-danger">{{ $errors->first('message') }}</p>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </div>
    </form>
@endsection
