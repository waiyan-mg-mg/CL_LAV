<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            form {
                max-width: 400px;
                margin: 0 auto;
                background-color: lightgrey;
                border-radius: 10px;
                padding: 15px 10px;
                margin-top: 50px;
            }

            form input,
            select {
                margin-bottom: 20px;
                font-size: 1.3rem;
            }

            form input,
            form select {
                width: 50%;
                height: 30px;
            }

            form button[type="submit"] {
                font-size: 1.6rem;
                display: block;
                padding: 5px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <form action="{{ url('/getInfo') }}" method="post">
            @csrf
            <label for="">Name</label>
            <input required type="text" name="customer_name"> <br>
            <label for="">location</label>
            <select required name="location" id="">
                <option value="">...</option>
                <option value="yangon">Yangon</option>
                <option value="mandalay">Mandalay</option>
                <option value="naypyitaw">Naypyitaw</option>
                <option value="mawlamyine">Mawlamyine</option>
                <option value="pyae">Pyae</option>
                <option value="hopone">Hopone</option>
                <option value="lashio">Lshio</option>
            </select><br>
            <label for="">Phone Number</label>
            <input required type="number" name="phone" id=""> <br>
            <button type="submit">Send</button>
        </form>
    </body>

</html>
