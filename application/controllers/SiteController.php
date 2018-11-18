<?php

class SiteController extends DBModel implements IController {
    private $_router;
    public $model;

    public function __construct(string $server = SERVER, string $username = USER_NAME, string $password = PASSWORD, string $db = DB_NAME)
    {
        $this->_router = RouterController::getInstance();
        /* Инициализация модели */
        $this->model = new FileModel();
        parent::__construct($server, $username, $password, $db);
    }

    public function indexAction() {
        $z=1;
        foreach ($z as $item) {
            echo $item;
        }
		$output = $this->model->render(DEFAULT_FILE, true);
        $this->_router->setBody($output);
	}

	public function sortTableAction() {
        $output = $this->model->render($_SERVER["DOCUMENT_ROOT"] . 'application/views/sort-js.html', true);
        $this->_router->setBody($output);
    }

    public function feedbackAction() {
        $output = $this->model->render($_SERVER["DOCUMENT_ROOT"] . 'application/views/feedback.php', true);
        $this->_router->setBody($output);
    }

    public function fileiterationAction () {
        ini_set('max_execution_time', '500');
        $count = 10000;
        $fr = new FileIteratorModel(/*'source/myphp/text.txt'*/TEXT_2GB);
        $randomIndexes = $fr->getRandomIndexes($count);
        $this->model->setDinamicContent($fr->readCustomStringGenerator($randomIndexes));
        $output = $this->model->render($_SERVER["DOCUMENT_ROOT"] . 'application/views/fileIteration.php', true);
        $this->_router->setBody($output);
    }
}
