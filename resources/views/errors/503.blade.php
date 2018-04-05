<?php
/**
 * Created by PhpStorm.
 * User: BuiHau
 * Date: 4/4/2018
 * Time: 5:06 PM
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <title>You haved Errors !</title>
</head>
<body>
    <div class="container">
        <div class="content">
            @if(count(errors) > 0)
                {{--danh sach loi--}}
                <div class="alert-danger">
                    <strong>Ahihi ! Co loi roi ban ei!!!</strong>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
    </div>
</body>
</html>
