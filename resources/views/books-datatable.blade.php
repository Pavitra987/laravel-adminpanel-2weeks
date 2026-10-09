<!DOCTYPE html>
<html>
<head>
    <title>Books DataTable</title>

    <link rel="stylesheet"
          href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
</head>

<body>

<h1>Books</h1>

<table id="booksTable" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Price</th>
        </tr>
    </thead>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

<script>
$(document).ready(function() {

    $('#booksTable').DataTable({
        processing: true,
        serverSide: true,

        ajax: '/books-datatable',
 
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'author' },
            { data: 'price' }
        ]
    });

});
</script>

</body>
</html>