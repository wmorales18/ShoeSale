@if ($errors->any())
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


@if ($message = Session::get('Correcto'))
    <div id="card-alert" class="card green">
        <div class="card-content white-text">
            <p>{{$message}}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


@if ($message = Session::get('Incorrecto'))
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
            <p>{{$message}}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
