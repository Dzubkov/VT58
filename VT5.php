<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php
            $host = "localhost";
            $user = "root";
            $password = "root";
            $dbName = "laba_5";

            $connection = mysqli_connect($host,$user,$password,$dbName) or die(mysqli_error($connection));

            mysqli_query($connection,"SET NAMES 'utf8'");

            $query = "SELECT article.title, article.text, author.name FROM article INNER JOIN author ON
                article.Author_id = author.id";

            $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

            $rows = mysqli_num_rows($result);

            $i = 0;
            $objects = array();
            while ($i < $rows){
                $row = mysqli_fetch_assoc($result);
                $objects[$i] = $row;
                $i++;
            }
            $i = 0;
        ?>
        <table border="1">
            <tr>
                <th>title</th>
                <th>text</th>
                <th>author_name</th>
            </tr>
            <?php
            while ($i < count($objects)){
            ?>
                <tr>
                    <td><?php echo $objects[$i]['title'] ?></td>
                    <td><?php echo $objects[$i]['text'] ?></td>
                    <td><?php echo $objects[$i]['name'] ?></td>
                </tr>
            <?php
                $i++;
            }

            $query = "SELECT programmer.id, programmer.name_pr, programmer.salary, programmer.company_id, company.name_com,
       programmer_specialization.specialization_id, specialization.name_spec FROM programmer INNER JOIN company ON
           programmer.company_id = company.id INNER JOIN programmer_specialization 
           ON programmer_specialization.programmer_id = programmer.id INNER JOIN specialization 
           ON  programmer_specialization.specialization_id = specialization.id ORDER BY programmer.name_pr ASC ";
            $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
            $rows = mysqli_num_rows($result);
            $i = 0;
            ?>
        </table>
        <br>
        <br>
        <br>

        <table border="1">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>salary</th>
                <th>company_id</th>
                <th>company</th>
                <th>specializations_id</th>
                <th>specializations</th>
            </tr>
            <?php
            $user = array();
            $user['id'] = "";
            $user['name_pr'] = "";
            $user['salary'] = "";
            $user['company_id'] ="";
            $user['name_com'] = "";
            $user['specialization_id'] = "";
            $user['name_spec'] = "";
            while ($i < $rows){
                $row = mysqli_fetch_assoc($result);
                if($user['name_pr'] == $row['name_pr']){
                    $user['specialization_id'] .= "<br>" . $row['specialization_id'];
                    $user['name_spec'] .= "<br>" . $row['name_spec'];
                }
                else{
                    if($user['name_pr'] != ""){
            ?>
                    <tr>
                        <td><?php echo $user['id']?></td>
                        <td><?php echo $user['name_pr']?></td>
                        <td><?php echo $user['salary']?></td>
                        <td><?php echo $user['company_id']?></td>
                        <td><?php echo $user['name_com']?></td>
                        <td><?php echo $user['specialization_id']?></td>
                        <td><?php echo $user['name_spec']?></td>
                    </tr>

                    <?php
                    }
                    $user['id'] = $row['id'];
                    $user['name_pr'] = $row['name_pr'];
                    $user['salary'] = $row['salary'];
                    $user['company_id'] = $row['company_id'];
                    $user['name_com'] = $row['name_com'];
                    $user['specialization_id'] = $row['specialization_id'];
                    $user['name_spec'] = $row['name_spec'];
                }
                $i++;
                if($i == $rows){
            ?>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['name_pr']?></td>
                    <td><?php echo $user['salary']?></td>
                    <td><?php echo $user['company_id']?></td>
                    <td><?php echo $user['name_com']?></td>
                    <td><?php echo $user['specialization_id']?></td>
                    <td><?php echo $user['name_spec']?></td>

                    <?php
                }
            }

            ?>

        </table>

</body>
</html>
