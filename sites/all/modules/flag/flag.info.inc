<?php

/**
 * @file Contains Entity API property information.
 */

/**
 * Implements hook_entity_property_info_alter().
 */
function flag_entity_property_info_alter(&$info) {
  foreach (flag_get_flags() as $flag) {
    if ($flag->global) {
      // Global flags.
      // Boolean property on entity type.
      if (count($flag->types)) {
        // Bundle specific property.
        foreach ($flag->types as $type) {
          $info[$flag->entity_type]['bundles'][$type]['properties']['flag_' . $flag->name] = array(
            'label' => t('Users who flagged the @type with flag @flag', array(
              '@type' => $type,
              '@flag' => $flag->name,
            )),
            'description' => t('Whether the entity is flagged with flag @flag.', array(
              '@flag' => $flag->name,
            )),
            'type' => 'boolean',
            'getter callback' => 'flag_properties_get_flagging_boolean',
            'computed' => TRUE,
            'flag_name' => $flag->name,
          );
        }
      }
      else {
        // Generic property, applies for all bundles.
        $info[$flag->entity_type]['properties']['flag_' . $flag->name] = array(
          'label' => t('Users who flagged the @type with flag @flag', array(
            '@type' => $type,
            '@flag' => $flag->name,
          )),
          'description' => t('Whether the entity is flagged with flag @flag.', array(
            '@flag' => $flag->name,
          )),
          'type' => 'boolean',
          'getter callback' => 'flag_properties_get_flagging_boolean',
          'computed' => TRUE,
          'flag_name' => $flag->name,
        );
      }
    }
    else {
      // Per-user flags.
      // User property: list of flagged entities by the user.
      $info['user']['properties']['flag_' . $flag->name . '_flagged'] = array(
        'label' => t('Flagged @entity-type with flag @flag', array('@entity-type' => $flag->entity_type, '@flag' => $flag->name)),
        'description' => t('Returns a list of entities a user flagged with flag @flag.', array('@flag' => $flag->name)),
        'type' => 'list<' . $flag->entity_type . '>',
        'getter callback' => 'flag_properties_get_flagged_content',
        'computed' => TRUE,
        'flag_name' => $flag->name,
      );
      if (count($flag->types)) {
        // Bundle specific property.
        foreach ($flag->types as $type) {
          $info[$flag->entity_type]['bundles'][$type]['properties']['flag_' . $flag->name . '_user'] = flag_entity_property_user_definition($type, $flag);
        }
      }
      else {
        // Generic property, applies for all bundles.
        $info[$flag->entity_type]['properties']['flag_' . $flag->name . '_user'] = flag_entity_property_user_definition($flag->entity_type, $flag);
      }
    }
  }
}

/**
 * Helper function that returns the entity property definition for user who
 * flagged a certain entity.
 *
 * @param $type_or_bundle
 *   Either be the bundle or the entity type.
 * @param $flag
 *   The flag object.
 *
 * @return
 *   An array containg the property information.
 */
function flag_entity_property_user_definition($type_or_bundle, $flag) {
  return array(
    'label' => t('Users who flagged the @type with flag @flag', array('@type' => $type_or_bundle, '@flag' => $flag->name)),
    'description' => t('Returns a list of users who flagged an entity with flag @flag.', array('@flag' => $flag->name)),
    'type' => 'list<user>',
    'getter callback' => 'flag_properties_get_flagging_users',
    'computed' => TRUE,
    'flag_name' => $flag->name,
  );
}

/**
 * Getter callback that returns entities the user flagged.
 */
function flag_properties_get_flagged_content($entity, array $options, $name, $entity_type, $property_info) {
  $flag = flag_get_flag($property_info['flag_name']);

  $result = db_select('flagging', 'f')
    ->fields('f', array('entity_id'))
    ->condition('fid', $flag->fid)
    ->condition('uid', $entity->uid)
    ->execute();
  return $result->fetchCol();
}

/**
 * Getter callback that returns users who flagged an entity.
 */
function flag_properties_get_flagging_users($entity, array $options, $name, $entity_type, $property_info) {
  $flag = flag_get_flag($property_info['flag_name']);

  $result = db_select('flagging', 'f')
    ->fields('f', array('uid'))
    ->condition('fid', $flag->fid)
    ->condition('entity_id', $flag->get_entity_id($entity))
    ->condition('uid', 0, '!=')
    ->execute();
  return $result->fetchCol();
}
