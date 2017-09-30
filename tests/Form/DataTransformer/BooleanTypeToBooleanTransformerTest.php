<?php

namespace FSevestre\BooleanFormTypeTest\Form\DataTransformer;

use FSevestre\BooleanFormType\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use FSevestre\BooleanFormType\Form\Type\BooleanType;

/**
 * @author Florent SEVESTRE
 */
class BooleanTypeToBooleanTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransformNull()
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertFalse($transformer->transform(null));
    }

    public function testTransformTrue()
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertTrue($transformer->transform(true));
    }

    public function testTransformFalse()
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertFalse($transformer->transform(false));
    }

    /**
     * @dataProvider getTransformFailedData
     */
    public function testTransformFailed($value)
    {
        $this->setExpectedException('Symfony\Component\Form\Exception\TransformationFailedException');

        $transformer = new BooleanTypeToBooleanTransformer();
        $transformer->transform($value);
    }

    public function getTransformFailedData()
    {
        return array(
            array(0),
            array('0'),
            array('false'),
            array('no'),
            array(1),
            array('1'),
            array('true'),
            array('yes'),
        );
    }

    public function testReverseTransformNull()
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertFalse($transformer->reverseTransform(null));
    }

    /**
     * @dataProvider getReverseTransformTrueData
     */
    public function testReverseTransformTrue($value)
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertTrue($transformer->reverseTransform($value));
    }

    public function getReverseTransformTrueData()
    {
        return array_map(function($value) {
            return array($value);
        }, BooleanType::$TRUE_VALUES);
    }

    /**
     * @dataProvider getReverseTransformFalseData
     */
    public function testReverseTransformFalse($value)
    {
        $transformer = new BooleanTypeToBooleanTransformer();

        static::assertFalse($transformer->reverseTransform($value));
    }

    public function getReverseTransformFalseData()
    {
        return array_map(function($value) {
            return array($value);
        }, BooleanType::$FALSE_VALUES);
    }

    public function testReverseTransformFailed()
    {
        $this->setExpectedException('Symfony\Component\Form\Exception\TransformationFailedException');

        $transformer = new BooleanTypeToBooleanTransformer();
        $transformer->transform('');
    }
}
