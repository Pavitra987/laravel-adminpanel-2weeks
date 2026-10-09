<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
      href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <title>ajax</title>
</head>
<body>
    <h1>books</h1>
    <button id="loadBooks">Load Books</button>
    <div id="books"></div>
    
   <h2>Add Book</h2> 

<form id="bookForm">

    <label>Book Name</label>
    <input type="text" id="bookname">

    <br><br>

    <label>Author</label>
    <input type="text" id="bookauthor">

    <br><br>

    <label>Description</label>
    <textarea id="bookdescription"></textarea>

    <br><br>

    <label>Price</label>
    <input type="number" id="bookprice">

    <br><br>

    <button type="submit">Add Book</button>

</form>
<br><br>
<h2>EDIT BOOK</h2>
<form id="editbookform">

    <input type="hidden" id="editid">
    <label>Book Name</label>
    <input type="text" id="editname">

    <br><br>

    <label>Author</label>
    <input type="text" id="editauthor">

    <br><br>

    <label>Description</label>
    <textarea id="editdescription"></textarea>

    <br><br>

    <label>Price</label>
    <input type="number" id="editprice">

    <br><br>

    <button type="submit">Update Book</button>
    <br><br>
    <table id="bookstable" border="1">
        <thead>
            <tr>
            <th>ID</th>
             <th>BOOK NAME</th>
              <th>AUTHOR</th>
               <th>PRICE</th>
                 <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
           

        </tbody>

    </table>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>   
<script>

function loadBooks() {

    $.ajax({

        url: '/api/books',

        type: 'GET',

        success: function(response) {

            let html = '';

            response.data.forEach(function(book) {

                html += `
                    <tr>
                    <td>${book.id}</td>
                    <td>${book.name}</td>
                    <td> ${book.author}</td>
                    <td> ${book.price}</td>
                    <td><button onclick="editbook(${book.id})">edit</button></td>
                    </tr>
                `;

            });

            $('#bookstable tbody').html(html);
            $('#bookstable').DataTable();

        },

        error: function(error) {

            console.log(error);

        }

    });

}


$('#loadBooks').click(function() {

    loadBooks();

});


$('#bookForm').submit(function(e) {

    e.preventDefault();

    $.ajax({

        url: '/api/books',

        type: 'POST',
        
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

        data: {

            bookname: $('#bookname').val(),
            bookauthor: $('#bookauthor').val(),
            bookdescription: $('#bookdescription').val(),
            bookprice: $('#bookprice').val()

        },

        success: function(response) {

            console.log(response);

            loadBooks();

        },

        error: function(error) {

            console.log(error.responseJSON);

        }

    });

});
function editbook(id)
{
    $.ajax({
        url:'/api/books/' +id,
        type:'GET',
        headers:{
            Accept:'application/json',
        },
        success:function(response){
            console.log(response.data);
              ($('#editid').val(response.data.id));
             ($('#editname').val(response.data.name));
              ($('#editauthor').val(response.data.author));
               ($('#editdescription').val(response.data.description));
                ($('#editprice').val(response.data.price));
        },
                error:function(error){
            console.log(error);
        },
        
    });

}
$('#editbookform').submit(function(e) {
    e.preventDefault();

    let id = $('#editid').val();

    console.log("ID:", id);

    $.ajax({
        url: '/api/books/' + id,
        type: 'PUT',

        data: {
            bookname: $('#editname').val(),
            bookauthor: $('#editauthor').val(),
            bookdescription: $('#editdescription').val(),
            bookprice: $('#editprice').val()
        },

        success: function(response) {
            console.log("Updated:", response);

            loadBooks();
        },

        error: function(error) {
            console.log("Error:", error.responseJSON);
        }
    });
});






</script>
</body>
</html>