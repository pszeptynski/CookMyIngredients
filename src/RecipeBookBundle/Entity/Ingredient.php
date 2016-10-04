<?php

namespace RecipeBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RecipeBookBundle\Entity\IngredientRepository")
 */
class Ingredient {

    /**
     *
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="ingredients")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    private $recipe;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="dict_id", type="integer")
     */
    private $dictId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="recipe_id", type="integer")
     */
    private $recipeId;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dictId
     *
     * @param integer $dictId
     * @return Ingredient
     */
    public function setDictId($dictId) {
        $this->dictId = $dictId;

        return $this;
    }

    /**
     * Get dictId
     *
     * @return integer 
     */
    public function getDictId() {
        return $this->dictId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Ingredient
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Set recipeId
     *
     * @param integer $recipeId
     * @return Ingredient
     */
    public function setRecipeId($recipeId) {
        $this->recipeId = $recipeId;

        return $this;
    }

    /**
     * Get recipeId
     *
     * @return integer 
     */
    public function getRecipeId() {
        return $this->recipeId;
    }


    /**
     * Set recipe
     *
     * @param \RecipeBookBundle\Entity\Recipe $recipe
     * @return Ingredient
     */
    public function setRecipe(\RecipeBookBundle\Entity\Recipe $recipe = null)
    {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * Get recipe
     *
     * @return \RecipeBookBundle\Entity\Recipe 
     */
    public function getRecipe()
    {
        return $this->recipe;
    }
}
