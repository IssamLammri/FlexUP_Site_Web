<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints as Assert ;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="PID_Type", columns={"PID_Type"}), @ORM\Index(name="ID_Main_Address", columns={"ID_Main_Address"})})
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"email"},
 *     message= "l'email que vous avez indiqué est dija utilisé !"
 *
 * )
 */
class Users implements UserInterface,\Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_User", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=false)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="Email_Confirmed", type="boolean", nullable=true)
     */
    private $emailConfirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="Mobile", type="string", length=50, nullable=false)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="First_Name", type="string", length=50, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_Name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="User_Name", type="string", length=100, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=false)
     * @Assert\Length(min="8",minMessage ="votre mot de passe doit fair miniume 8 carcataire" )
     * @Assert\EqualTo(propertyPath="confirm_password",message ="vous n'avez pas tapé le meme mot de passe")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password",message ="vous n'avez pas tapé le meme mot de passe")
     */
    public $confirm_password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="Is_Pro", type="boolean", nullable=true)
     */
    private $isPro;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Main_Address", referencedColumnName="ID_Address")
     * })
     */
    private $idMainAddress;

    /**
     * @var \TypeIdentifyDocument
     *
     * @ORM\ManyToOne(targetEntity="TypeIdentifyDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PID_Type", referencedColumnName="ID_Type_Identify")
     * })
     */
    private $pidType;

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailConfirmed(): ?bool
    {
        return $this->emailConfirmed;
    }

    public function setEmailConfirmed(?bool $emailConfirmed): self
    {
        $this->emailConfirmed = $emailConfirmed;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsPro(): ?bool
    {
        return $this->isPro;
    }

    public function setIsPro(?bool $isPro): self
    {
        $this->isPro = $isPro;

        return $this;
    }

    public function getIdMainAddress(): ?Addresses
    {
        return $this->idMainAddress;
    }

    public function setIdMainAddress(?Addresses $idMainAddress): self
    {
        $this->idMainAddress = $idMainAddress;

        return $this;
    }

    public function getPidType(): ?TypeIdentifyDocument
    {
        return $this->pidType;
    }

    public function setPidType(?TypeIdentifyDocument $pidType): self
    {
        $this->pidType = $pidType;

        return $this;
    }
    public function __toString()
    {
        $chaine = (string)$this->getIdUser();
        return $chaine;

    }


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->idUser,
            $this->firstName,
            $this->lastName,
            $this->password,
            $this->email,
            $this->emailConfirmed,
            $this->mobile,
            $this->isPro,
            $this->userName,
            $this->idMainAddress,
            $this->pidType
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->idUser,
            $this->firstName,
            $this->lastName,
            $this->password,
            $this->email,
            $this->emailConfirmed,
            $this->mobile,
            $this->isPro,
            $this->userName,
            $this->idMainAddress,
            $this->pidType
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}
