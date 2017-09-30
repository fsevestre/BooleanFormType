<?php

namespace FSevestre\BooleanFormType\Form\DataTransformer;

use FSevestre\BooleanFormType\Form\Type\BooleanType;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * @author Florent SEVESTRE
 */
final class BooleanTypeToBooleanTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        if (null === $value) {
            return false;
        }

        if (!is_bool($value)) {
            throw new TransformationFailedException('Expected a boolean.');
        }

        return $value;
    }

    public function reverseTransform($value)
    {
        if (null === $value) {
            return false; // `false` and empty values are converted to `null` during form submission.
        }

        if (in_array($value, BooleanType::$TRUE_VALUES, true)) {
            return true;
        } elseif (in_array($value, BooleanType::$FALSE_VALUES, true)) {
            return false;
        }

        throw new TransformationFailedException('Invalid value.');
    }
}
