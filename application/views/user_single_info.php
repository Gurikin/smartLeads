<?php
//    echo "<tr>";
//    foreach ($this->userList[$i] as $userCol => $userField) {
//        if (!is_array($userField) && $userCol != 'user_id') {
//            echo "<td>$userField</td>";
//        } else {
//            $userTasksCount = count($userField);
//        }
//    }
//    echo "<td style='wordwrap: break-word; white-space: nowrap;'>$userTasksCount</td>";
//    echo "</tr>";
?>


    <div>
        <h4>Детальная информация о сотруднике</h4>
            <hr />
        <dl class='dl-horizontal'>
            <dt>Имя</dt>

            <dd><?=$this->userList['firstName']?></dd>

            <dt>Фамилия</dt>

            <dd><?=$this->userList['secondName']?></dd>

            <dt>Отчество</dt>

            <dd><?=$this->userList['middleName']?></dd>

            <dt>Должность</dt>

            <dd><?=$this->userList['jobTitle']?></dd>

            <dt>Телефон</dt>

            <dd><?=$this->userList['phone']?></dd>
            <dt>Назначенные задания</dt>
            <dd class="dd-inline">
                <table class="table">
                <tr>
                    <th>Описание</th>
                    <th>Дата назначения</th>
                    <th>Закончить</th>
                    <th>Прогресс</th>
                </tr>
                <?php
                    foreach ($this->userList['task'] as $task) {
                       echo "<tr>"
                            . "<td>"
                               . $task['taskTitle']
                            . "</td>"
                            . "<td>"
                               . $task['orderDate']
                            . "</td>"
                            . "<td>"
                               . $task['endDate']
                            . "</td>"
                            . "<td>"
                               . $task['progress']
                            . "</td>"
                            ."</tr>";
                    }
                ?>
                </table>                
            </dd>
        </dl>
    </div>

<div>
    <!--<a href="/user/selectUser">Вернуться к списку</a>
    <a href="#" onclick="$('#modalWindow').toggle(350);//renderResponse('GET', '', '/user/selectUser'); ">Вернуться к списку</a>-->
</div>
<?php
    
?>