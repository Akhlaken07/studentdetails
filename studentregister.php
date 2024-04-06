<?php
session_start();
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Details</title>
       
    </head>
    <body>
    <h1>Student Details</h1> 
    <a href="logout.php" style="
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#e53935'" onmouseout="this.style.backgroundColor='#f44336'">
        Logout
    </a><br><br>

        <?php
        include 'display.php';
        ?><br>

        <form id="stud" action="studentdetails.php" method="post">
            <div>
                <label for="name">Name (Legal/Official) : </label>
                <input type="text" id="name" name="name" pattern="[A-Za-z].{1,}" title="Alphabet and spaces only"><br><br>
            <div>
                <label for="matricno">Matric No. : </label>
                <input type="text" id="matricno" name="matricno" pattern="[0-9].{6,}" title="Number only"><br><br>
            </div>
            <div>
                <label for="cAddress">Current Address : </label>
                <input type="text" id="cAddress" name="cAddress" pattern="[a-zA-Z0-9\s,.'-]{3,}$/" title="Follow address format"><br><br>
            </div>
            <div>
                <label for="hAddress">Home Address : </label>
                <input type="text" id="hAddress" name="hAddress" pattern="[a-zA-Z0-9\s,.'-]{3,}$/" title="Follow address format"><br><br>
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="text" id="email" name="email" pattern="[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z0-9]+$" title="Follow email format"><br><br>
            </div>
            <div>
                <label for="mPhone">Mobile Phone No. </label>
                <input type="text" id="mPhone" name="mPhone" pattern="[0-9].{9,}" title="Number only"><br><br>
            </div>
            <div>
                <label for="hPhone">Home Phone No. </label>
                <input type="text" id="hPhone" name="hPhone" pattern="[0-9].{9,}" title="Number only"><br><br>
            </div>
            <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" pattern="[A-Za-z\d]{6,}" title="Must be at least 6 characters"><br><br>
            </div>
            <input type="submit" value="Submit" style="
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">
        </form>

    <script src="patternregex.js"></script>
    </body>
    </html>
