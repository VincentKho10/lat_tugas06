<?php
$mrn=filter_input(1,"mrn");
if(isset($mrn)){
    $mrns = getOnePatient($mrn);
    var_dump($mrns);
}

$updated=filter_input(0,"btnPatClicked");
if(isset($updated)){
    $cidn = filter_input(0,"cidn");
    $nme = filter_input(0,"nme");
    $addr = filter_input(0,"adr");
    $bhp = filter_input(0,"bhp");
    $bhd = filter_input(0,"bhd");
    $phn = filter_input(0,"phn");
    $ins = filter_input(0,"ins");
    $namafile = $mrn;
    if(($_FILES['pto']['name'] == null) == 1){
        echo "kolom file kosong";
        $pto = $mrns['photo'];
    }else{
        unlink($mrns['photo']);
        $namatemp = $_FILES['pto']['tmp_name'];
        $namadir = "upload/";
        move_uploaded_file($namatemp,$namadir.$namafile);
        $pto = $namadir.$namafile;
    }
    updPatient($mrn,$cidn,$nme,$addr,$bhp,$bhd,$phn,$pto,$ins);
    header("Location:index.php?nav=pat");
}
?>

<fieldset>
    <lengend>update pasien</lengend>
    <form method="post" enctype="multipart/form-data">
        <label for="citidnum">citizen id number:</label><br>
        <?php
            echo'<input type="text" id="citidnum" name="cidn" value="'.$mrns["citizen_id_number"].'">';
        ?>
        <br>

        <label for="name">name:</label><br>
        <?php
        echo '<input type="text" id="name" name="nme" value="'.$mrns["name"].'">';
        ?>
        <br>

        <label for="addr">address:</label><br>
        <?php
            echo '<input type="text" id="addr" name="adr" value="'.$mrns["address"].'">';
        ?>
        <br>

        <label for="bipl">birth place:</label><br>
        <?php
            echo '<input type="text" id="bipl" name="bhp" value="'.$mrns["birth_place"].'">';
        ?>
        <br>

        <label for="bida">birth date:</label><br>
        <?php
            echo '<input type="date" id="bida" name="bhd" value="'.$mrns["birth_date"].'">';
        ?>
        <br>

        <label for="phnum">phone number:</label><br>
        <?php
            echo '<input type="text" id="phnum" name="phn" value="'.$mrns["phone_number"].'">';
        ?>
        <br>

        <label for="phto">photo:</label><br>
        <?php
            echo '<input type="file" id="phto" name="pto" value="'.$mrns["photo"].'">';
        ?>
        <br>

        <label for="insurance">insurance:</label><br>
        <select id="insurance" name="ins">
            <?php
            $insurances = getAllInsurance();
            foreach ($insurances as $item) {
                if($item['id']==$mrns['insurance_id']){
                    echo "<option value='".$item['id']."' selected>".$item['name_class']."</option>";
                }else{
                    echo "<option value='".$item['id']."'>".$item['name_class']."</option>";
                }
            }
            ?>
        </select>
        <button type="submit" name="btnPatClicked">update</button>
    </form>
</fieldset>
