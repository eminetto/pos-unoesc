<?php

namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Beer extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Beer name',
            ],
            'type'  => 'Text',
        ]);
        $this->add([
            'name' => 'style',
            'options' => [
                'label' => 'Beer style',
            ],
            'type'  => 'Text',
        ]);

         $this->add([
            'name' => 'img',
            'options' => [
                'label' => 'Beer image',
            ],
            'type'  => 'Text',
        ]);

        $this->add([
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);

        $this->setAttribute('action', '/save');
        $this->setAttribute('method', 'post');
    }

}
