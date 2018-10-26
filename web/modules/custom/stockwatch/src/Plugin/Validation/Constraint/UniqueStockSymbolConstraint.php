<?php

namespace Drupal\stockwatch\Plugin\Validation\Constraint;

use Drupal\Core\Annotation\Translation;
use Symfony\Component\Validator\Constraint;

/**
 * Checks that a submitted stock symbol doesn't already exist.
 *
 * @Constraint(
 *   id = "UniqueStockSymbolConstraint",
 *   label = @Translation("Unique Stock Symbol", context = "Validation"),
 *   type = "string"
 * )
 */
class UniqueStockSymbolConstraint extends Constraint {

  // The message that will be shown if the value is not an integer.
  public $message = 'Stock Symbol (%value) already exists';

}
