<?php
require_once 'Product.php';
if (isset($_POST['submit']))
{
    if (!empty($_FILES['file']['name']))
    {
        $counter = 0;
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        while (($getData = fgetcsv($csvFile, 10000, ';')) !== FALSE)
        {
            ++$counter;
            if ($counter === 1) {
                continue;
            }
            $product = new Product();
            if (is_array($getData) && !empty($getData[0])) {
                $product->setCode($getData[0]);
                $product->setName($getData[1]);
                $product->setFirstLevel($getData[2]);
                $product->setSecondLevel($getData[3]);
                $product->setThirdLevel($getData[4]);
                $product->setPrice($getData[5]);
                $product->setPriceSP($getData[6]);
                $product->setQuantity($getData[7]);
                $product->setPropFields($getData[8]);
                $product->setJointPurchases($getData[9]);
                $product->setMeasurementUnit($getData[10]);
                $product->setPicture($getData[11]);
                $product->setIsDisplayed($getData[12]);
                $product->setDescription($getData[13]);
                $product->save();
            }
        }
        fclose($csvFile);
        header("Location: products.php");
    }
    else
    {
        echo "Пожалуйста, выберите корректный файл";
    }
}