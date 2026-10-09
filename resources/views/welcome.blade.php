<!DOCTYPE html>
<html>
<head>

    <title>Books</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7f8;
            color: #222;
        }

    

        .navbar {
            background: #ffffff;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links a {
            text-decoration: none;
            margin-left: 15px;
            padding: 10px 20px;
            border-radius: 6px;
            color: #222;
        }

        .login {
            border: 1px solid #333;
        }

        .register {
            background: #ae9393;
            
        }

        /* Header */

        .hero {
            text-align: center;
            
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .hero p {
            color: #666;
            font-size: 17px;
        }

    

        .books-container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding-bottom: 50px;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
        }

        .book-card:hover {
            transform: translateY(-5px);

        }

        

        .book-images {
            height: 280px;
            display: flex;
            gap: 5px;
            overflow: hidden;
            background: #eee;
        }

        .book-images img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }



        .book-details {
            padding: 20px;
        }

        .book-details h2 {
            margin: 0 0 8px;
            font-size: 22px;
        }

        .author {
            color: #666;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .description {
            color: #555;
            line-height: 1.5;
        }

    

       

            .books-container {
                grid-template-columns: 1fr;
            }

        

    </style>

</head>

<body>

    <!-- Navbar -->

    <div class="navbar">

        <div class="logo">
            📚 Book Store
        </div>

        <div class="nav-links">

            <a href="/login" class="login">
                LOGIN
            </a>

            <a href="/register" class="register">
                REGISTER
            </a>

        </div>

    </div>


    <!-- Page Header -->

    <div class="hero">

        <h1>Explore Our Books</h1>

        <p>Discover books added to our collection</p>

    </div>


    <!-- Books -->

    <div class="books-container">

        @foreach($books as $book)

            <div class="book-card">

                <!-- Images -->

                <div class="book-images">

                    @foreach($book->images as $image)

                        <img src="{{ asset('storage/' . $image->image) }}"
                             alt="{{ $book->name }}">

                    @endforeach

                </div>


                <!-- Details -->

                <div class="book-details">

                    <h2>
                        {{ $book->name }}
                    </h2>

                    <div class="author">
                        <strong>Author:</strong>
                        {{ $book->author }}
                    </div>

                    <div class="description">
                        {{ $book->description }}
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</body>
</html>