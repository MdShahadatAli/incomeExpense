<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "income_expense";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

session_start();

$sid=$_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Income Expense saving task</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">


    </head>
    <body>
        <div class="container">
            <a href="logout.php" >Logout</a>
            <?php echo "<h1>Welcome</h1>"; ?>


            <table border="1" class="table table-striped">
                <th>Income/Expense</th>
                <th>Amount</th>
                <?php
                $total_qty=0;


                $query=$conn->query("select * from income left join category on category.cid=income.cid WHERE uid LIKE $sid" );
                while($row=$query->fetch_array()) {
                ?>
                <tr>
                    <td><?php 
                    $category = $row['income']; 

                    if($category == 1)
                    {
                        echo "income";
                    }
                    else if($category == 2)
                    {
                        echo "expense";
                    }

                        ?>
                    </td>


                    <td><?php echo $row['tvalue']; ?></td>
                </tr>
                <?php 
                    $total_qty += $row['tvalue'];
                }
                ?>
            </table>
            <div>
                <br>

                <h3>Income/Expense Balance</h3>
                <ul>
                    <?php 
                    $a=$conn->query("select *, sum(tvalue) as total_sales from income WHERE uid LIKE $sid AND income LIKE '1'");
                    while($arow=$a->fetch_array()){
                    ?>
                    <li>Total income: <?php 

                        echo $arow['total_sales'];
                        $income = $arow['total_sales'];
                        ?>
                    </li>
                    <?php 
                    }
                    ?>

                </ul>


                <ul>
                    <?php 
                    $a=$conn->query("select *, sum(tvalue) as total_expense from income WHERE uid LIKE $sid AND income LIKE '2'");
                    while($arow=$a->fetch_array()){
                    ?>
                    <li>Total expense: <?php 

                        echo $arow['total_expense'];
                        $expense = 0 - $arow['total_expense'];

                        ?>


                    </li>

                    <?php 
                    }
                    ?>

                </ul>

                <ul>
                    <li>Current Balance: 
                        <?php 

                        $balance = $income + $expense;

                        echo $balance;
                        ?>
                    </li>

                </ul>


                <h3>Insert New Sales</h3>
                <form method="POST" action="add_sale.php">
                    <select class="form-select" aria-label="Default select example" name="sales_product">
                        <option value="0">Select Product</option>
                        <?php
                        $p=$conn->query("select * from category");
                        while($prow=$p->fetch_array()){
                        ?>
                        <option value="<?php echo $prow['cid']; ?>"><?php echo $prow['cname']; ?></option>
                        <?php
                        }

                        ?>
                    </select>
                    Qty: <input type="text" name="tvalue" required>
                    <input type="submit" value="ADD">
                </form>
                <span>
                    <?php
                    if (isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                    }
                    ?>
                </span>
                <br>
                <br>

                <br>
                <br>
            </div>
        </div>
    </body>
</html>