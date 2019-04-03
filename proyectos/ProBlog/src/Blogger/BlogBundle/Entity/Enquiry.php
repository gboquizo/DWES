<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 06/02/2019
 * Time: 14:11
 */

namespace Blogger\BlogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Enquiry
{
    /**
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @Assert\Email(
     *     message = "El correo '{{ value }}' no es un correo válido.",
     *     checkMX = true
     * )
     */
    protected $email;

    /**
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage="Your first name must be at least {{ limit }} characters long",
     *     maxMessage="Your first name cannot be longer that{{ limit }} characters"
     *
     * )
     */
    protected $subject;

    /**
     * @Assert\Length(
     *     min = 2,
     *     minMessage="Your first name must be at least {{ limit }} characters long",
     *
     * )
     */
    protected  $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

}