@extends('layouts.app')

@section('title', 'Animación')

@section('content')
    <article class="contenedor">
        <svg width="200px" height="200px">
        <polygon points="10,190 100,10 190,190"/>
        </svg>
    </article>

    <style>
        .contenedor{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        svg{
            width: 200px;
            height: 200px;
        }
        polygon{
            fill: transparent;
            stroke: 10;
            stroke: rgb(42, 81, 165);
            stroke-width: 4px;
            stroke-dasharray: 1560;
            stroke-dashoffset: 0;
        }
        polygon:hover{
            animation: animate 2s linear forwards;
        }
        @keyframes animate
        {
            0%
            {
                stroke-dashoffset: 0;
            }
            40%
            {
                stroke-dashoffset: 1560;
            }
            80%
            {
                stroke-dashoffset: 3120;
                fill: transparent;
            }
            100%
            {
                stroke-dashoffset: 3120;
                fill: rgb(42, 81, 165);
            }
        }
    </style>
@endsection