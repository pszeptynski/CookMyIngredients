<?php

namespace RecipeBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Recipe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RecipeBookBundle\Entity\RecipeRepository")
 */
class Recipe {

    /**
     * @ORM\OneToMany(targetEntity="Ingredient", mappedBy="recipe")
     */
    private $ingredients;

    /**
     * @ORM\OneToMany(targetEntity="SecondaryIngredient", mappedBy="recipe")
     */
    private $secondaryIngredients;

    public function __construct() {
        $this->ingredients = new ArrayCollection();
        $this->secondaryIngredients = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="recipes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="preparation", type="text")
     */
    private $preparation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Recipe
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Recipe
     */
    public function setUserId($userId) {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Recipe
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Add ingredients
     *
     * @param \RecipeBookBundle\Entity\Ingredient $ingredients
     * @return Recipe
     */
    public function addIngredient(\RecipeBookBundle\Entity\Ingredient $ingredients) {
        $this->ingredients[] = $ingredients;

        return $this;
    }

    /**
     * Remove ingredients
     *
     * @param \RecipeBookBundle\Entity\Ingredient $ingredients
     */
    public function removeIngredient(\RecipeBookBundle\Entity\Ingredient $ingredients) {
        $this->ingredients->removeElement($ingredients);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredients() {
        return $this->ingredients;
    }

    /**
     * Add secondaryIngredients
     *
     * @param \RecipeBookBundle\Entity\SecondaryIngredient $secondaryIngredients
     * @return Recipe
     */
    public function addSecondaryIngredient(\RecipeBookBundle\Entity\SecondaryIngredient $secondaryIngredients) {
        $this->secondaryIngredients[] = $secondaryIngredients;

        return $this;
    }

    /**
     * Remove secondaryIngredients
     *
     * @param \RecipeBookBundle\Entity\SecondaryIngredient $secondaryIngredients
     */
    public function removeSecondaryIngredient(\RecipeBookBundle\Entity\SecondaryIngredient $secondaryIngredients) {
        $this->secondaryIngredients->removeElement($secondaryIngredients);
    }

    /**
     * Get secondaryIngredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSecondaryIngredients() {
        return $this->secondaryIngredients;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Recipe
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set preparation
     *
     * @param string $preparation
     * @return Recipe
     */
    public function setPreparation($preparation) {
        $this->preparation = $preparation;

        return $this;
    }

    /**
     * Get preparation
     *
     * @return string 
     */
    public function getPreparation() {
        return $this->preparation;
    }

}
