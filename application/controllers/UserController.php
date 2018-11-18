<?php

/**
 * This controller manage the users
 *
 * @author BIV
 */
class UserController extends DBModel implements IController {

    /**
     * @var string table - using table in db
     * @var string activeUserView - using view of active users in db
     * @var string firedUserView - using view of unactive users in db
     * @var object $_fc instance of FrontController class
     * @var object $_model instance of FileModel class
     * @var object $_dbh instance of DBConnect class
     * @var object $_userTaskContoller instance of UserTaskController class. Need for the data selecting
     */
    public $table = 'feedback';
    private $_router;
    private $_model;
    private $_dbh;
    private $_userTaskController;

    public function __construct() {
        $this->_router = RouterController::getInstance();
        /* Инициализация модели */
        $this->_model = new FileModel();
        parent::__construct();
        $this->_dbh = parent::getDbh();
    }

    /**
     * @todo Вызов страницы с таблицей для сортировки
     * @param boolean $actUser - выбирать действующих или уволившихся сотрудников
     * @throws PDOException
     */
    public function selectUserAction($actUser = true) {
        try {
            if ($actUser) {
                $query = "SELECT * FROM " . $this->activeUserView . " LIMIT 0, 50";
            } else {
                $query = "SELECT * FROM " . $this->firedUserView . " LIMIT 0, 50";
            }
            $resultSelect = $this->_dbh->query($query);
            if ($resultSelect === false) {
                throw new PDOException;
            }
            $i = 0;
            while ($row = $resultSelect->fetch(PDO::FETCH_ASSOC)) {
                $row['task'] = $this->_userTaskController->selectUserTasks($row['user_id']);
                $tableView[$i] = $row;
                $i++;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        $this->_model->userList = $tableView;
        $output = $this->_model->render(USER_LIST_FILE);
        $this->_router->setBody($output);
    }

    /**
     * @todo Этот метод выбирает из БД одного сотрудника по его id
     * @param int $userId
     * @throws PDOException
     */
    public function selectUserConstAction($userId) {
        $query = "SELECT firstName, secondName, middleName, jobTitle, phone FROM " . $this->table . " WHERE id=$userId"; // . $userId;
        $resultSelect = $this->_dbh->query($query);
        if ($resultSelect === false) {
            throw new PDOException;
        }
        $row = $resultSelect->fetch(PDO::FETCH_ASSOC);
        $row['task'] = $this->_userTaskController->selectUserTasks($userId);
        $tableView = $row;
        $this->_model->userList = $row;
        $output = $this->_model->render(USER_SINGLE_INFO);
        $this->_router->setBody($output);
    }

    /**
     * @todo Этот метод добавляет нового пользователя в БД
     * @throws PDOException
     */
    public function addAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            $firstName = $_POST['firstName'];
            $secondName = $_POST['secondName'];
            $middleName = $_POST['middleName'];
            $jobTitle = $_POST['jobTitle'];
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $phone = $_POST['phone'];
        }
        $insQuery = "INSERT INTO user ( firstName, 
					secondName, 
					middleName, 
					jobTitle,
                                        login,
                                        password,
                                        phone) 
					VALUES ('$firstName', 
                                                '$secondName', 
                                                '$middleName', 
                                                '$jobTitle',
                                                '$login',
                                                '$password',
                                                '$phone')";
        $insResult = $this->_dbh->query($insQuery);
        if ($insResult === false) {
            throw new PDOException;
        } else {
            echo "<h4>Новый сотрудник добавлен успешно</h4><hr>";
            return;
        }
    }

    /**
     * @todo this method output the page for the add user to the DB
     */
    public function createAction() {
        $output = $this->_model->render(USER_CREATE_FILE);
        $this->_router->setBody($output);
    }

    public function updateData() {
        
    }

    //предполагается не удаление, а изменение видимости записей данных
    public function deleteAction($userId) {
        $selectQuery = "SELECT firstName, secondName FROM " . $this->table . " WHERE id=$userId";
        $delQuery = "DELETE FROM " . $this->table . " WHERE id=$userId";
        $resultSelect = $this->_dbh->query($selectQuery);
        $resultDelete = $this->_dbh->query($delQuery);
        if ($resultSelect === false && $resultDelete === false) {
            throw new PDOException;
        } else {
            $row = $resultSelect->fetch(PDO::FETCH_ASSOC);
        }
        echo "User ".$row['firstName']." ".$row['secondName']." has deleted.";
    }

}

?>