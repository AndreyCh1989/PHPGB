<?php


namespace app\engine;


class Request
{
    protected $requestString;
    protected $method;
    protected $controllerName;
    protected $actionName;
    protected $params;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $this->requestString);
        $this->controllerName = $url[1];
        $this->actionName = $url[2];
        $this->params = $_REQUEST;
        //парсинг json-post данных
        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)) {
            foreach ($data as $key => $elem) {
                $this->params[$key] = $elem;
            }
        }
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }
}
