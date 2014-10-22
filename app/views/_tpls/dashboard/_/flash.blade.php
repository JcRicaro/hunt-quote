@if ( ! $errors->isEmpty() )

<div class="alert alert-danger">
	<ul>
    @foreach ( $errors->all() as $error )
    <li> {{ $error }} </li>
    @endforeach
    </ul>
</div>

{{-- JC CHECK --}}
@elseif ( Session::has('error') )
	<div class="alert alert-danger"> {{ Session::get('error') }} </div>
@elseif ( Session::has( 'message' ) )
    <div class="alert alert-success">{{ Session::get( 'message' ) }}</div>
@elseif ( Session::has( 'success' ) )
    <div class="alert alert-success">{{ Session::get( 'success' ) }}</div>
@else
    <p>&nbsp;</p>
@endif