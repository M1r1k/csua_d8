<?php

/**
 * @file
 * Definition of Drupal\taxonomy\Plugin\views\argument\IndexTid.
 */

namespace Drupal\taxonomy\Plugin\views\argument;

use Drupal\taxonomy\Entity\Term;
use Drupal\views\Plugin\views\argument\ManyToOne;
use Drupal\Component\Utility\String;

/**
 * Allow taxonomy term ID(s) as argument.
 *
 * @ingroup views_argument_handlers
 *
 * @ViewsArgument("taxonomy_index_tid")
 */
class IndexTid extends ManyToOne {

  public function titleQuery() {
    $titles = array();
    $terms = Term::loadMultiple($this->value);
    foreach ($terms as $term) {
      $titles[] = String::checkPlain(\Drupal::entityManager()->getTranslationFromContext($term)->label());
    }
    return $titles;
  }

}
