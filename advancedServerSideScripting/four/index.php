<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thoughtify</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            padding: 50px 5px;
            text-align: center;
            background:black;
        }
        table,tr,td,th{
            border: 1px solid black;
            width: 100%;
            text-align: left;
            padding: 10px;
            border-collapse: collapse;
        }
        .id_display{
            width: 10%;
        }
        .result_container{
            margin-top: 10px;
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <div class="container" >
        <input id="thoughtsInputField" type="text" placeholder="Enter your thoughts" />
        <button id="submit" >submit</button>
    </div>

    <div class="result_container" >
    <table>
        <tr>
            <th class="id_display" >Id</th>
            <th  >Thought</th>
            <th>Date</th>
        </tr>
        <?php require('./dbconnection.php');

            $sqlStatement = "SELECT * FROM `randomthoughts` WHERE 1 ORDER By createdAt DESC;";
            $result = $conn->query($sqlStatement);

            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                            <td class='id_display'>{$row["id"]}</td>
                            <td>{$row["thought"]}</td>
                            <td>{$row["createdAt"]}</td>
                        </tr>";
                }
            }

        ?>
    </table>
    </div>
    </div>

    <script>

        const submitBtn = document.getElementById("submit");
        const inputField = document.getElementById("thoughtsInputField");

        submitBtn.addEventListener('click',async (e)=>{
            if(!inputField.value){
                return;
            }

            const fetchResult = await fetch('store.php',{
                method:'post',
                headers:{
                    'Content-Type':'application/x-www-form-urlencoded'
                },
                body:`thought=${inputField.value}`
            })

            const result = await fetchResult.json();
            inputField.value = "";
            inputField.focus()

            window.location.replace("");
            
            

        })



    </script>

</body>
</html>