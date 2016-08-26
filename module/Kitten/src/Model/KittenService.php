<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Kitten\Model;

/**
 * Class KittenService
 *
 * @package Kitten\Model
 */
class KittenService
{
    /**
     * @var array
     */
    private $data
        = [
            1 => [
                'id'    => 1,
                'name'  => 'Katze Minki',
                'image' => '/katzen/katze01.jpg',
            ],
            2 => [
                'id'    => 2,
                'name'  => 'Katze Mautz',
                'image' => '/katzen/katze02.jpg',
            ],
            3 => [
                'id'    => 3,
                'name'  => 'Katze Klara',
                'image' => '/katzen/katze03.jpg',
            ],
            4 => [
                'id'    => 4,
                'name'  => 'Katzenbande',
                'image' => '/katzen/katze04.jpg',
            ],
            5 => [
                'id'    => 5,
                'name'  => 'Katze Schnucki',
                'image' => '/katzen/katze05.jpg',
            ],
            6 => [
                'id'    => 6,
                'name'  => 'Katze Horst',
                'image' => '/katzen/katze06.jpg',
            ],
            7 => [
                'id'    => 7,
                'name'  => 'Katze Ludmilla',
                'image' => '/katzen/katze07.jpg',
            ],
            8 => [
                'id'    => 8,
                'name'  => 'Katze Schnurri',
                'image' => '/katzen/katze08.jpg',
            ],
        ];

    /**
     * @return array
     */
    public function fetchAll()
    {
        return $this->data;
    }

    /**
     * @param $id
     *
     * @return bool|mixed
     */
    public function fetchOneById($id)
    {
        if (!isset($this->data[$id])) {
            return false;
        }

        return $this->data[$id];
    }

    /**
     * @return array
     */
    public function fetchRandomKitten()
    {
        $randomKeys = array_rand($this->data, 3);

        shuffle($randomKeys);

        return [
            $this->data[$randomKeys[0]],
            $this->data[$randomKeys[1]],
            $this->data[$randomKeys[2]],
        ];
    }
}