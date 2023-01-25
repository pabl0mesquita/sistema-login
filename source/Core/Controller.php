<?php

namespace Source\Core;
use Source\Support\Message;
use Source\Core\View;

/**
 * [ Class Controller ]
 *
 * @author Pablo V. Mesquita <pablo_omesquita@hotmail.com>
 * @package Source\Core
 */
class Controller
{
    /** @var View */
    protected $view;

    /** @var Seo */
    protected $seo;

    /** @var message */
    protected $message;


    public function __construct(string $pathToViews)
    {
        $this->view = new View($pathToViews);
        $this->message = new Message();
    }






}
