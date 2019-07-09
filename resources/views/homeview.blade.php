@extends('home')

@section('index-content')





@if (Auth::check())
                @if ($perfil == 'admin' )
                    <ul>
                      <li>lkasjdlaksdjla</li>
                    </ul>
                @else
                    <p>Canten putos </p>
                    <p>Canten putos </p>
                @endif
 @endif


@stop