<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="mt-5 container">
    @if ($items->count() >0) <h3>Items</h3>
    <table class="table">
        <thead class="thead bg-dark" style="color:white">
            <tr>
                <th scope="col">ItemName</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">description</th>
                <th scope="col">status</th>
                <th scope="col">image</th>


            </tr>
        </thead>
        <tbody>
             @foreach ($items as $item)
                <tr>
                    <td>{{ $item->item->ItemName}}</td>
                    <td>{{ $item->volunteerName }}</td>
                    <td>{{ $item->volunteerEmail }}</td>
                    <td>{{ $item->volunteerPhone }}</td>
                    <td>{{ $item->volunteerAddress }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->status }}</td>
                    {{-- <td> <img src="{{$item->image}}" alt="" style="width:120px"> </td> --}} --}}


                </tr>
            @endforeach


</tbody>
</table>
@endif
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
