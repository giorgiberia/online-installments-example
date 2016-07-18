<?php

$product_name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
$product_price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : null;

if (!$product_name || !$product_price) {
    die('request error');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ონლაინ განვადება | ბანკი რესპუბლიკა</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="App__top-banner"></div>

<div id="app" v-cloak>

    <div v-show="formSubmitted">
        <div class="bs-callout bs-callout-danger" v-if="submissionError">
            <h3>მოხდა შეცდომა განაცხადის გაგზავნისას</h3>
            <h1></h1>
            <button class="btn btn-lg btn-default" @click="tryAgain">სცადეთ თავიდან</button>
        </div>
        <div class="bs-callout bs-callout-success" v-if="!submissionError">
            <h3>თქვენი განაცხადი მიღებულია, გმადლობთ რომ სარგებლობთ ჩვენი მომსახურებით</h3>
        </div>
    </div>

    <vf-form client method="POST" :validation="validation" v-show="!formSubmitted">
        <div style="display: none">
            <vf-text :disabled="true" name="entry.000000001" value="<?= $product_name ?>"></vf-text>
            <vf-text :disabled="true" name="entry.000000002" value="<?= $product_price ?>"></vf-text>
        </div>

        <div class="bs-callout bs-callout-danger">
            <h3>ძირითადი ინფორმაცია</h3>
            <h4 style="font-style: italic">დასახელება: <?= $product_name ?></h4>
            <h4 style="font-style: italic">ფასი: <?= $product_price ?> ლარი</h4>
        </div>

        <vf-text label="სახელი" name="entry.000000003"></vf-text>
        <vf-text label="გვარი" name="entry.000000004"></vf-text>
        <vf-text label="მამის სახელი" name="entry.000000005"></vf-text>
        <vf-date label="დაბადების თარიღი" placeholder="თარიღი" name="entry.000000006"
                 :options="daterangeOptions"
        ></vf-date>
        <vf-text label="დაბადების ადგილი რეგისტრაციის მიხედვით" name="entry.000000007"></vf-text>
        <vf-buttons-list label="პირადობის დამადასტურებული დოკუმენტის ტიპი" name="entry.000000008"
                         :value="idTypes[0].value"
                         :items="idTypes"></vf-buttons-list>
        <vf-text label="პირადი ნომერი" name="entry.000000009">
            <p slot="afterField" class="Form__field-desc">
                გთხოვთ მიუთითოთ პირადობის დამადასტურებელ დოკუმენტში მითითებული 11 ნიშნა ნომერი
            </p>
        </vf-text>
        <vf-text label="საბუთის ნომერი" name="entry.000000010">
            <p slot="afterField" class="Form__field-desc">
                მაგ: ა123456, აღნიშნული განთავსებულია პირადობის მოწმობაზე სურათის ქვემოთ
            </p>
        </vf-text>
        <vf-date label="პირადობის დამადასტურებელი დოკუმენტის გაცემის თარიღი" placeholder="თარიღი"
                 name="entry.000000011"
                 :options="daterangeOptions"
        ></vf-date>
        <vf-text label="გამცემი ორგანო" name="entry.000000012"></vf-text>
        <vf-date label="მოქმედების ვადა" name="entry.000000013" placeholder="თარიღი"
                 :options="daterangeOptions"
        ></vf-date>
        <vf-text label="მობილურის ნომერი" name="entry.000000014"></vf-text>
        <vf-text label="სახლის ტელეფონის ნომერი" name="entry.000000015"></vf-text>
        <vf-text label="ელფოსტა" name="entry.000000016"></vf-text>
        <vf-text label="იურიდიული მისამართი" name="entry.000000017"></vf-text>
        <vf-text label="ფაქტიური მისამართი" name="entry.000000018"></vf-text>
        <vf-number label="ფაქტიურ მისამართზე ცხოვრების დრო (წელი)" name="entry.000000019"></vf-number>
        <vf-number label="ოჯახის საშუალო თვიური ხარჯი (ლარი)" name="entry.000000020"></vf-number>
        <vf-number label="ოჯახის წევრების რაოდენობა" name="entry.000000021"></vf-number>
        <vf-textarea label="საკონტაქტო ოჯახის წევრი, ნათესაური კავშირის ტიპი და მისი მობილურის ნომერი"
                     name="entry.000000022"></vf-textarea>
        <vf-select label="ოჯახური მდგომარეობა" name="entry.000000023" :value="relStatus[0].value"
                   :items="relStatus"></vf-select>
        <vf-number label="ბავშვების რაოდენობა" name="entry.000000024" value="0"></vf-number>
        <vf-select label="სქესი" name="entry.000000025" :items="sexTypes" :value="sexTypes[0].value"></vf-select>
        <vf-text label="განათლება" name="entry.000000026"></vf-text>
        <vf-number label="სასურველი გადახდის რიცხვი" name="entry.000000027"></vf-number>
        <vf-number label="სასურველი განვადების ხანგრძლივობა (თვე)" name="entry.000000028"></vf-number>
        <vf-text label="კოდური სიტყვა" name="entry.000000029"></vf-text>

        <div class="bs-callout bs-callout-danger">
            <h3>ხელფასი / შემოსავალი</h3>
        </div>

        <vf-text label="ორგანიზაციის დასახელება" name="entry.000000030"></vf-text>
        <vf-text label="ორგანიზაციის საქმიანობის სფერო" name="entry.000000031"></vf-text>
        <vf-text label="ორგანიზაციის მისამართი" name="entry.000000032"></vf-text>
        <vf-text label="ორგანიზაციის ტელ. ნომერი" name="entry.000000033"></vf-text>
        <vf-text label="დაკავებული თანამდებობა" name="entry.000000034"></vf-text>
        <vf-number label="მუშაობის ხანგრძლივობა (თვე)" name="entry.000000035"></vf-number>
        <vf-text label="უშუალო ხელმძღვანელი (სახელი, გვარი) და მისი თანამდებობა" name="entry.000000036"></vf-text>
        <vf-text label="უშუალო ხელმძღვანელის ტელეფონი" name="entry.000000037"></vf-text>
        <vf-text label="ყოველთვიური ხელზე ასაღები ხელფასი (ლარი)" name="entry.000000038"></vf-text>
        <vf-select label="მომსახურე ბანკი" name="entry.000000039" :items="banksList"
                   :value="banksList[0].value"></vf-select>
        <vf-textarea label="დამატებითი ინფორმაცია შემოსავლების შესახებ" name="entry.000000040"></vf-textarea>

        <vf-submit text="განაცხადის გაგზავნა"></vf-submit>
    </vf-form>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/vue/dist/vue.min.js"></script>
<script src="bower_components/vue-resource/dist/vue-resource.min.js"></script>
<script src="bower_components/vue-formular/dist/vue-formular.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>