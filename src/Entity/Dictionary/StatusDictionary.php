<?php

namespace App\Entity\Dictionary;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Dictionary\AbstractDictionary;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Dictionary\StatusDictionaryRepository")
 */
class StatusDictionary extends AbstractDictionary
{
 /*   public function __construct()
    {
        parent::__construct();
    }*/
}
