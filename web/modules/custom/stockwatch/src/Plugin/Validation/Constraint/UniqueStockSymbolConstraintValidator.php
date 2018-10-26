<?php

namespace Drupal\stockwatch\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the UniqueStockSymbolConstraint constraint.
 */
class UniqueStockSymbolConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    foreach ($items as $item) {
      // Next check if the Stock Symbol value is unique.
      if (!$this->symbolUnique($item->value)) {
        $this->context->addViolation($constraint->message, ['%value' => $item->value]);
      }
    }
  }

  /**
   * Verify that the Stock Symbol being entered doesn't already exist.
   *
   * @param string $value
   *
   * @return bool
   *   Returns true or false depending on weather or not the Stock's title
   *   (symbol) is unique.
   */
  private function symbolUnique($value) {

    $query = \Drupal::entityQuery('node');
    $query->condition('title', $value);
    $result = $query->execute();

    if (empty($result)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}
