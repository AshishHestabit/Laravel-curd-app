<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            height:50vh;
            width:50vw;
        }
        .box2{
            display:none;
        }
        .w-5{
            /* display :none; */
            height : 20px;
            width : 15px;
        }
    </style>
</head>
<body>
    <?php $d['id'] = 1;?>
    <x-boot />
    <div class="d-flex justify-content-between">
        <h5>Data of all the students of CT</h5> <button id="button" class="flex-end" onclick="show(this,'block')">Insert</button>
    </div>
    @if(session('flag_i'))
    <h2 class="btn btn-success" id="pop1" onload="load_i(this,'none')">Data inserted Succesfully with name ,{{session('name')}}</h2>
    @endif
    @if(session('flag_d'))
    <h2 class="btn btn-success" id="pop2">Data deleted Succesfully with name ,{{session('name')}}</h2>
    @endif
   <div class="d-flex">
    <div class="box1 box">
      <table>
          <tr>
              <th>id</th>
              <th>name</th>
              <th>urn</th>
          </tr>
         @if($data)
         @foreach($data as $d)
          <tr>
              <td>{{$d['id']}}</td>
              <td>{{$d['name']}}</td>
              <td>{{$d['urn']}}</td>
              <td>
                  <a id="delete" onclick="del(this)" href=''>delete</a>
              </td>
              <td>
                  <a id="edit" onclick="edit(this)" href="{{'edit/'.$d['id']}}">Edit</a>
              </td>
          </tr>
          @endforeach
          @endif
      </table><br>
     <div>
     {{$data->links()}}
     </div>
    </div>
    <div>

    </div>
    <div class="box2 box" id="box2">
        <div class="d-flex justify-content-between">
            <h4>Insert Form</h4><h4 onclick="cut(this)">X</h4>
        </div>
        <form action="insert" method="post">
            @csrf 
            Name:<input type="text" name="name" placeholder="enter your name"><br>
            URN:  <input type="text" name="urn" placeholder="enter your urn"><br>
            <input type="submit">
        </form>
    </div>
   </div >

   <script>
    // var ele = document.getElementById("pop1");
    // console.log(ele);
    function show(ele,type){
        document.getElementById('box2').style.display='block';
        // console.log(ele);
        
        //
    }

    function del(ele){
        // var ele = document.getElementById('delete').style.display='block';
        e = ele
        if(confirm("Are you sure you want to delete")){
            var id = @json($d['id']);
            console.log(id);
            // window.location.href('delete/'+id);
            e.setAttribute("href",`delete/${id}`)

        }
    }

    // function load_i(ele,type){
    //     console.log("inserted data succesfully",e,t)
    //     e=ele;
    //     t = type
    //     const myTimeout = setTimeout(myGreeting, 5000);
        
    //     function myGreeting() {
    //         e.style.display = t;
    //     }
       
    // }
    function cut(ele){
        var box2 = document.getElementById('box2'); 
        box2.style.display = 'none';
    }


        


    
   </script>
</body>
</html>