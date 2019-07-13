<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        .container {
            font-family: 'Montserrat', sans-serif;
            margin: 60px auto;
            margin-left: 30px;
        }
        .list-inline {
            text-align: left;
            margin-bottom: 30px;
        }
        .title {
            font-weight: bold;
            font-size: 26px;
        }
        th {
            text-align: center;
        }
        td {
            height: 100px;
        }
        th:nth-of-type(6), td:nth-of-type(6) {
            color: blue;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: red;
        }
        .today {
            background-color: ghostwhite;
        }
        #links{
            float: right;
            margin-right: 130px;
            margin-top: 200px;
        }
        #logout{
            float: right;
            margin-top: -30px;
            margin-right: 30px;
        }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

