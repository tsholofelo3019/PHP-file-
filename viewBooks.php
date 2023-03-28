<!DOCTYPE html>

<html>
<style>
    body{font-family: Georgia}

    .Link1 
    {
        padding-right: 50
    }

    .Link2 
    {
        padding-right:50
    }

    .Link3 
    {
        padding-right:50
    }
    .Link4 
    {
        padding-right:50
    }
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
   
    
    </style>
<head>
</head>
<body>

    <h1>Varsity Books </h1>
	
    <a href="login.php">logout   </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="usedBooks.php">Used Books   </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a name="sellBooksLink" href="sellBooks.php">Sell Books     </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="index.php"> Show cart    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin.php">      Admin</a>
</br></br>
    <button > <a href="addBook.php" > Add Book</a></button>
</br>
<?php include "viewBooksCode.php"; ?>
</body>
</html>