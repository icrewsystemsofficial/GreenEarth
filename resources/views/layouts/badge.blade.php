<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <style>
        html {
            box-sizing: border-box;
            font-family: Mulish;
        }

        *, *:before, *:after {
            box-sizing: border-box;
        }

        div {
            display: block;
        }
    </style>
</head>
<body>
<div style='position:absolute;right:10px;bottom:10px;'>

    <!-- Link to open the modal -->
    <a href="#ex1" rel="modal:open">Open Modal</a>

    <div id="ex1" class="modal">
        <p>Thanks for clicking. That felt good.</p>
        <a href="#" rel="modal:close">Close</a>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</body>
</html>