@foreach(['primary','secondary','success','danger','warning','info','light','dark'] as $msg)
    @if(session()->has($msg))
        <div class="message_box">
            <div class="alert alert-{{$msg}}">
                {{ session()->get($msg) }}
            </div>
        </div>
    @endif
@endforeach