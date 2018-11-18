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
     * @todo Этот метод добавляет нового пользователя в БД
     * @throws PDOException
     */
    public function feedbackAddAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            $firstName = $_POST['firstName'];
            $email = $_POST['email'];
            $feedbackbody = $_POST['feedbackbody'];
        }
        $insQuery = "INSERT INTO feedback ( name,email,body) VALUES ('$firstName','$email','$feedbackbody')";
        $insResult = $this->_dbh->query($insQuery);
        if ($insResult === false) {
            throw new PDOException;
        } else {
            $this->_model->setDinamicContent("Благодарим за обратную связь. Ваше мнение важно для нас.");
        }
        $output = $this->_model->render($_SERVER["DOCUMENT_ROOT"] . 'application/views/feedbackThanks.php', true);
        $this->_router->setBody($output);
    }
}

?>