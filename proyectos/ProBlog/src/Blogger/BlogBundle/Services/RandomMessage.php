<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/02/2019
 * Time: 8:40
 */

namespace Blogger\BlogBundle\Services;

class RandomMessage
{
    public function getHappyMessage()
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}