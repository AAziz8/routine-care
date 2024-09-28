@extends('admin_layout.master')
@section('content')
    @push('title')
        Socials |ZentoStores
    @endpush
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Edit Social
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    Socials
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
                        <p>{{ $message }}</p>
                    </div>

                    <script>
                        setTimeout(function () {
                            $('#success-alert').fadeOut('slow');
                        }, 3000);
                    </script>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('updates.update', ['id' => 1]) }}">
                        @csrf

                        <div class="mb-3">
                            <label><b>Twitter</b></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                <input type="url" required name="twitter" class="form-control"
                                       value="{!!  $updates->twitter ?? '' !!}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label><b>Facebook</b></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                <input type="url" required name="facebook" class="form-control"
                                       value="{!!  $updates->facebook ?? '' !!}">
                            </div>
                        </div>



                        <div class="mb-3">
                            <label><b>Instagram</b></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="url" required name="instagram" class="form-control"
                                       value="{!!  $updates->instagram ?? '' !!}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label><b>Google</b></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-google-plus"></i></span>
                                <input type="url" required name="google" class="form-control"
                                       value="{!!  $updates->google ?? ''!!}">
                            </div>
                        </div>


                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </form>

                </div>
            </div>
@endsection
