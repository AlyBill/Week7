<?php


$conn = mysqli_connect('localhost', 'root', '', 'todolist');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoryID = $_POST['categoryID'];
        $categoryName = $_POST['categoryName'];

        $sql = "INSERT INTO categories (categoryID, categoryName) VALUES ('$categoryID', '$categoryName')";
        mysqli_query($conn, $sql);
    }

    $sql = "SELECT * FROM todoitems";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryID = $row['categoryID'];
            $categoryName = $row['categoryName'];
           
        }
    } 

    // Close the database connection
    mysqli_close($conn);
    ?>

<html>
<body>

<h2>Category</h2>
    <form method="POST" action="index.php">
        <label for ="categoryID">Category ID: </label>
        <input type="text" id="categoryID" name="categoryID" required maxlength="20"><br><br>
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required maxlength="50"><br><br>
        <input type="submit" value="Add">
    </form>
</div> 
</div>

</body>
</html>