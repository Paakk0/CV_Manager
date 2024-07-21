<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Styles\MainStyle.css">
    <title>CV_Manager</title>
</head>

<body>
    <?php
    include '..\Database\DB_Creator.php';
    include '..\Database\Config.php';
    ?>
    <div class="main_win">
        <h1 class="title">Създаване на CV</h1>
        <form class="mainForm" method="post">
            <div class="names">
                <input type="text" name="first-name" placeholder="Име" class="name" /><br>
                <input type="text" name="middle-name" placeholder="Презиме" class="name" /><br>
                <input type="text" name="last-name" placeholder="Фамилия" class="name" /><br>
            </div>
            <div class="date">
                <span>Дата на раждане</span>
                <input type="date" id="birthdate" name="birthdate"/><br>    
            </div>
            <div class="uni">
                <select name="uni">
                    <?php
                    $conn = getConn();
                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }
                    $sql    = 'SELECT UNI_NAME FROM Universities';
                    $result = $conn->query($sql);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option>' . $row['UNI_NAME'] . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <button type="button" onclick="showForm('uni')"></button>
            </div>
            <div class="tech">
                <span>Умения в технологии</span>
                <select name="tech" multiple>
                    <?php
                    $conn = getConn();
                    if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }
                    $sql    = 'SELECT TECH_NAME FROM Technologies';
                    $result = $conn->query($sql);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option>' . $row['TECH_NAME'] . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <button type="button" onclick="showForm('tech')"></button>
            </div>
            <input type="submit" name="submit" value="Запис на CV" class="send" />
        </form>
    </div>

    <div id="popup">
        <span id="title">Добави</span>
        <form method="post">
            <input type="text" id="entryUni" name="valueUni" placeholder="Университет" />
            <input type="text" id="entryTech" name="valueTech" placeholder="Технология" />
            <input type="submit" value="Добави" name="send"/>
        </form>
        <?php
        include '../Database/AddEntry.php';
        ?>
    </div>

    <a href="ShowCandidates.php" class="tableLink" >Виж всички кандидати</a>
    <script src="..\Scripts\script.js"></script>
</body>

</html>