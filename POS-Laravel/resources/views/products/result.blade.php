@extends('layouts.admin')
@if (count($members)>0 )
   
    @foreach ($members as $member )
    <li class="list-group-item"><a href="{{ url('member/'.$member->id) }}">{{ $member->name }} </a></li>
    @endforeach
@else
<li class="list-group-item">no data found</li>
@endif