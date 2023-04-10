<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Card Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $version
 * @property string $type
 * @property string $rarity
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Card extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'image' => true,
        'version' => true,
        'type' => true,
        'rarity' => true,
        'quantity' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
    ];
}
