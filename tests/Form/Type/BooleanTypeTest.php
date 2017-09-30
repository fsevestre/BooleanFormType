<?php

namespace FSevestre\BooleanFormTypeTest\Form\Type;

use FSevestre\BooleanFormType\Form\Type\BooleanType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * @author Florent SEVESTRE
 */
class BooleanTypeTest extends TypeTestCase
{
    /**
     * @dataProvider getFormTypeTrueData
     */
    public function testFormTypeTrue($value)
    {
        $form = $this->factory->create('FSevestre\BooleanFormType\Form\Type\BooleanType');

        $form->submit($value);

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->getData());
    }

    public function getFormTypeTrueData()
    {
        return array_map(function($value) {
            return array($value);
        }, BooleanType::$TRUE_VALUES);
    }

    /**
     * @dataProvider getFormTypeFalseData
     */
    public function testFormTypeFalse($value)
    {
        $form = $this->factory->create('FSevestre\BooleanFormType\Form\Type\BooleanType');

        $form->submit($value);

        $this->assertTrue($form->isSynchronized());
        $this->assertFalse($form->getData());
    }

    public function getFormTypeFalseData()
    {
        return array_merge(
            array_map(function($value) {
                return array($value);
            }, BooleanType::$FALSE_VALUES),
            array(array(null), array(''))
        );
    }

    /**
     * @dataProvider getFormTypeInvalidData
     */
    public function testFormTypeInvalid($value)
    {
        $form = $this->factory->create('FSevestre\BooleanFormType\Form\Type\BooleanType');

        $form->submit($value);

        $this->assertFalse($form->isSynchronized());
    }

    public function getFormTypeInvalidData()
    {
        return array(
            array('invalid'),
        );
    }
}
