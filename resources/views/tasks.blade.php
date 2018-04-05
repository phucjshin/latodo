<?php
/**
 * Created by PhpStorm.
 * User: BuiHau
 * Date: 4/4/2018
 * Time: 10:28 AM
 */
?>
{{--Thua ke lai view layouts/app.blade.php--}}
@extends('layouts.app')
{{--Noi dung view con--}}
@section('content')

    <div class="panel-body">
        {{--@include('errors.503')--}}
        <form action="{{url('task')}}" method="post">
            {{csrf_field()}}
            Task:
            <br>
            <input type="text" name="name" id="task-name" placeholder="Your Task... " autofocus required>
            <button type="submit">Add Task</button>
        </form>

        {{--Show Task--}}
        @if(count($t) > 0)
        <div class="panel-heading">
            <h1 style="color: tomato">Show Task ! </h1>
        </div>
            <div class="panel-body">
               <table>
                        @foreach($t as $p)
                            <tr>
                                {{--Show list task--}}
                                <td>{{$p->name}}</td>
                                {{--Nut xoa task--}}
                                <td>
                                    <form action="task/{{$p->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button>Delete</button>
                                    </form>
                                </td>
                                {{--Nut sua task--}}
                                <td>
                                <form action="update/{{$p->id}}" method="get">
                                    {{csrf_field()}}
                                    <input type="text" name="name-change" placeholder="Change Your Task... ">
                                    <button type="submit">Update Task</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
               </table>
            </div>
            @endif
         </div>
    </div>
@endsection