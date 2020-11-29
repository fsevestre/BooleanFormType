<?php

namespace FSevestre\BooleanFormTypeTest\Form\DataTransformer;

use FSevestre\BooleanFormType\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * @author Florent SEVESTRE
 */
class BooleanTypeToBooleanTransformerTest extends TestCase
{
    public function testTransformNull()
    {
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertFalse($transformer->transform(null));
    }

    public function testTransformTrue()
    {
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertTrue($transformer->transform(true));
    }

    public function testTransformFalse()
    {
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertFalse($transformer->transform(false));
    }

    /**
     * @dataProvider getTransformFailedData
     */
    public function testTransformFailed($value)
    {
        $this->expectException(TransformationFailedException::class);

        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));
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
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertFalse($transformer->reverseTransform(null));
    }

    /**
     * @dataProvider getReverseTransformTrueData
     */
    public function testReverseTransformTrue($value)
    {
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertTrue($transformer->reverseTransform($value));
    }

    public function getReverseTransformTrueData()
    {
        return array_map(function($value) {
            return array($value);
        }, array(1, '1', true, 'true'));
    }

    /**
     * @dataProvider getReverseTransformFalseData
     */
    public function testReverseTransformFalse($value)
    {
        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));

        static::assertFalse($transformer->reverseTransform($value));
    }

    public function getReverseTransformFalseData()
    {
        return array_map(function($value) {
            return array($value);
        }, array(0, '0', false, 'false'));
    }

    public function testReverseTransformFailed()
    {
        $this->expectException(TransformationFailedException::class);

        $transformer = new BooleanTypeToBooleanTransformer(array(1, '1', true, 'true'), array(0, '0', false, 'false'));
        $transformer->transform('');
    }
}
