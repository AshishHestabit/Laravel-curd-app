<x-boot />

<div class="box2 box" id="box2">
        <div class="d-flex justify-content-between">
            <h4>Insert Form</h4><h4 onclick="cut(this)">X</h4>
        </div>
        <form action="{{URL::TO('/update')}}" method="post">
            @csrf 
            <input type="hidden" name="id" value="{{$data['id']}}">
            Name:<input type="text" name="name" placeholder="enter your name" value="{{$data['name']}}"><br>
            URN:  <input type="text" name="urn" placeholder="enter your urn" value="{{$data['urn']}}"><br>
            <input type="submit">
        </form>
    </div>