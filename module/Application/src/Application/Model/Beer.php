<?php
namespace Application\Model;

use Zend\InputFilter\InputFilter;

class Beer
{
    public $id;
    public $name;
    public $style;
    public $img;

    /**
     * Configura os filtros dos campos da classe
     *
     * @return Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name'     => 'id',
            'required' => false,
            // 'filters'  => array(
            //     array('name' => '\Zend\Filter\Int'),
            // ),
        ));

        $inputFilter->add(array(
            'name'     => 'name',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 100,
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'style',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 100,
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'img',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));

        return $inputFilter;
    }
    //usado pelo TableGateway
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->name = (!empty($data['name'])) ? $data['name'] : null;
        $this->style  = (!empty($data['style'])) ? $data['style'] : null;
        $this->img  = (!empty($data['img'])) ? $data['img'] : null;
    }
}
