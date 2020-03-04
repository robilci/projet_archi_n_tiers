<?php


namespace App\controller;

use App\utils\session\Session;


class Controller {

    protected  $viewPath = '';
    protected  $template;

    /**
     * @param $view
     * @param array $variables
     * The render method displays the view from the controller, it takes as a parameter
     * a view and one or more variables
     */
    protected function renderWithoutAuth($view, $variables = []) {
        ob_start();
        // extract the variables transformed by the compact php function
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();

        require ($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function render($view, $variables = []) {

        ob_start();
        // extract the variables transformed by the compact php function
        extract($variables);
        if(Session::exist())
            require($this->viewPath . str_replace('.', '/', $view) . '.php');
        else
            require($this->viewPath . 'authentication.php');
        $content = ob_get_clean();

        require ($this->viewPath . 'templates/' . $this->template . '.php');
    }



    /**
     * s'afficher en cas d'erreur 404
     */
    protected  function notFound() {
        header("HTTP/1.0 404 Not found");
        header('Location:index.php?p=404');
    }

    /**
     * @return mixed
     * recuperer le titre de la page
     */
    protected  function getTitle() {
        return $this->title;
    }

    /**
     * @param $title
     * modifie le titre de la page
     */
    protected  function setTitle($title) {
        $this->title .= ' | '.$title;
    }
}