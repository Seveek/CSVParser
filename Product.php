<?php
class Product {
    private object $db;
    private string $code;
    private string $name;
    private string $level1;
    private string $level2;
    private string $level3;
    private string $price;
    private string $priceSP;
    private float $quantity;
    private string $propFields;
    private string $jointPurchases;
    private string $measurementUnit;
    private string $picture;
    private int $isDisplayed;
    private string $description;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=test', 'root', 'mysql');
    }

    public function setCode($value): void {
        $this->code = $value;
    }

    public function setName($value): void {
        $this->name = $value;
    }

    public function setFirstLevel($value): void {
        $this->level1 = $value;
    }

    public function setSecondLevel($value): void {
        $this->level2 = $value;
    }

    public function setThirdLevel($value): void {
        $this->level3 = $value;
    }

    public function setPrice($value): void {
        $this->price = $value;
    }

    public function setPriceSP($value): void {
        $this->priceSP = $value;
    }

    public function setQuantity($value): void {
        $this->quantity = $value;
    }

    public function setPropFields($value): void {
        $this->propFields = $value;
    }

    public function setJointPurchases($value): void {
        $this->jointPurchases = $value;
    }

    public function setMeasurementUnit($value): void {
        $this->measurementUnit = $value;
    }

    public function setPicture($value): void {
        $this->picture = $value;
    }

    public function setIsDisplayed($value): void {
        $this->isDisplayed = $value;
    }

    public function setDescription($value): void {
        $this->description = $value;
    }

    public function save(): void {
        $sql = "
        INSERT INTO products (code, name, level1, level2, level3, price, priceSP, quantity, prop_fields,
            joint_purchases, measurement_unit, picture, is_displayed, description)
        VALUES (:code, :name, :level1, :level2, :level3, :price, :priceSP, :quantity, :prop_fields, :joint_purchases,
                :measurement_unit, :picture, :is_displayed, :description)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'code' => $this->code,
            'name' => !empty($this->name) ? $this->name : NULL,
            'level1' => !empty($this->level1) ? $this->level1 : NULL,
            'level2' => !empty($this->level2) ? $this->level2 : NULL,
            'level3' => !empty($this->level3) ? $this->level3 : NULL,
            'price' => !empty($this->price) ? $this->price : NULL,
            'priceSP' => !empty($this->priceSP) ? $this->priceSP : NULL,
            'quantity' => !empty($this->quantity) ? $this->quantity : NULL,
            'prop_fields' => !empty($this->propFields) ? $this->propFields : NULL,
            'joint_purchases' => !empty($this->jointPurchases) ? $this->jointPurchases : NULL,
            'measurement_unit' => !empty($this->measurementUnit) ? $this->measurementUnit : NULL,
            'picture' => !empty($this->picture) ? $this->picture : NULL,
            'is_displayed' => !empty($this->isDisplayed) ? $this->isDisplayed : NULL,
            'description' => !empty($this->description) ? $this->description : NULL
        ]);
    }
}